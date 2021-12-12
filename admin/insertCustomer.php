<?php
require('authenticate.php');
require('dbconnector.php');
if (isset($_POST['submit'])) {
    if (isset($_POST['firstname']) &&isset($_POST['lastname']) && 
        isset($_POST['street']) && isset($_POST['city']) && 
        isset($_POST['state']) && isset($_POST['zipcode']) && 
        isset($_POST['phonenumber']) && isset($_POST['email']) && 
        isset($_POST['username']) && isset($_POST['dateofbirth'])
        ) 
        {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $dateofbirth = $_POST['dateofbirth'];
        
        $customerID=  $_POST['customerID'];
        if($customerID==-1)
        {
            $mode="ADD";
        }
        else 
        { 
            $mode="EDIT";
        }
        
        if ($mode=="ADD"){
        
            $Select = "SELECT customer_ID FROM customers WHERE customer_email = ?";
            $Insert = "INSERT INTO customers(customer_first_name, customer_last_name, customer_street, customer_city,customer_state, ".
                "customer_zip_code,customer_phone_number,customer_email,customer_username,customer_DOB) values(?, ?, ?, ?,?,?,?,?,?,?)";
            $stmt = $connection->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultcustomerID);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $connection->prepare($Insert);
                $stmt->bind_param("sssssissss",$firstname, $lastname, $street,$city,$state,
            $zipcode,$phonenumber,$email,$username,$dateofbirth);
                if ($stmt->execute()) {
                     header("location: fetchCustomers.php?result=insertSuccess");
                }
                else {
                     header("location: fetchCustomers.php?result=insertFailed");
                }
            }
             else {
                 header("location: fetchCustomers.php?result=insertFailed");
            }
            
        }
        else if($mode=="EDIT"){
            //$Select = "SELECT car_ID FROM cars WHERE VIN = ?";
            $EDIT = "UPDATE customers SET  customer_first_name =?, customer_last_name=?, customer_street=?, customer_city=?,customer_state=?, ".
                "customer_zip_code=?,customer_phone_number=?,customer_email=?,customer_username=?,customer_DOB=? WHERE customer_ID=?";
            
            $stmt = $connection->prepare($EDIT);
                $stmt->bind_param("sssssissssi", $firstname, $lastname, $street,$city,$state,
            $zipcode,$phonenumber,$email,$username,$dateofbirth,$customerID);
                if ($stmt->execute()) {
                    //echo "New record inserted sucessfully.";
                    header("location: fetchCustomers.php?result=editSuccess");
                }
            
        }
        $stmt->close();
        $connection->close();
        
    }
    else {
        echo "All field are required Customer.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>