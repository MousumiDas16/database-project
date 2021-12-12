<?php
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




        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "test";
        
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT customerID FROM customer WHERE customerID = ? LIMIT 1";
            $Insert = "INSERT INTO customer(firstname, lastname, street, city,state,zipcode,
            phonenumber,email,username,dateofbirth) values(?, ?, ?, ?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("i", $customerID);
            $stmt->execute();
            $stmt->bind_result($resultcustomerID);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssssiisss",$firstname, $lastname, $street,$city,$state,
            $zipcode,$phonenumber,$email,$username,$dateofbirth);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
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