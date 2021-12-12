<?php
require('authenticate.php');
require('dbconnector.php');

if (isset($_POST['submit'])) {
    if (isset($_POST['firstname']) &&
        isset($_POST['lastname']) && isset($_POST['ssn']) &&
        isset($_POST['street']) && isset($_POST['city']) && 
        isset($_POST['state']) && isset($_POST['zipcode']) && 
        isset($_POST['phonenumber']) && isset($_POST['email']) && 
        isset($_POST['username']) && isset($_POST['dateofbirth'])
        && isset($_POST['startdate']) && isset($_POST['password']) 
        ) 
        {
        
         $employeeID=  $_POST['employeeID'];
        if($employeeID==-1)
        {
            $mode="ADD";
        }
        else 
        { 
            $mode="EDIT";
        }
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $ssn = $_POST['ssn'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $dateofbirth = $_POST['dateofbirth'];
        $startdate = $_POST['startdate'];
        $password = $_POST['password'];
        $emprole =$_POST['emprole'];
        
         if($mode=="ADD"){

  
            $Select = "SELECT employee_ID FROM employees WHERE SSN = ?";
            $Insert = "INSERT INTO employees(first_name, last_name, role_ID, SSN, street, city,state,zip_code,
            phone_number,email,username,DOB,start_date,password) values(?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $connection->prepare($Select);
            $stmt->bind_param("i", $SSN);
            $stmt->execute();
            $stmt->bind_result($resultemployeeID);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $connection->prepare($Insert);
                $stmt->bind_param("ssissssissssss",$firstname, $lastname, $emprole, $ssn, $street,$city,$state,
            $zipcode,$phonenumber,$email,$username,$dateofbirth,$startdate,$password);
                if ($stmt->execute()) {
                     header("location: fetchEmployee.php?result=insertSuccess");
                }
                else {
                     header("location: fetchEmployee.php?result=insertFailed");
                }
            }
            else {
                 header("location: fetchEmployee.php?result=insertFailed");
            }
         }
        
        else if($mode=="EDIT"){
            //$Select = "SELECT car_ID FROM cars WHERE VIN = ?";
            $EDIT = "UPDATE employees SET  first_name =?, last_name =?, role_ID=?, SSN=?, street=?, city=?,state=?,zip_code=?,
            phone_number=?,email=?,username=?,DOB=?,start_date=?,password=? WHERE employee_ID=?";
            
            $stmt = $connection->prepare($EDIT);
                $stmt->bind_param("ssissssissssssi", $firstname, $lastname, $emprole, $ssn, $street,$city,$state,
            $zipcode,$phonenumber,$email,$username,$dateofbirth,$startdate,$password, $employeeID);
                if ($stmt->execute()) {
                    //echo "New record inserted sucessfully.";
                    header("location: fetchEmployee.php?result=editSuccess");
                }
            
        }
            $stmt->close();
            $connection->close();
        }
    }
    else {
        echo "All field are required EMPLOYEES.";
        die();
    }