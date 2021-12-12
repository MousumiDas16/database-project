<?php
session_start();
if (isset( $_SESSION["loggedin"]) &&  $_SESSION["loggedin"] == true)
{
     header("location: fetchCar.php");
}

if(isset($_POST['username']) && isset($_POST['userpass'])){
    
    $user=$_POST['username'];
    $password=$_POST['userpass'];
    
    if(empty($user)){
        $username_err = "Please enter username.";
    } 
    
    
    if(empty(trim($password))){
        $password_err = "Please enter your password.";
    } 
    
    require('dbconnector.php');
    $query = "SELECT employee_ID, first_name, last_name from employees WHERE username =? and password =?";
    $stmt = $connection->prepare($query);  
    
    $stmt->bind_param('ss',$user, $password);
    $stmt->execute();
    
    $stmt->bind_result($ID, $first_name, $last_name);
    $stmt->store_result();
    if($stmt->num_rows ==1){
       
        $stmt->fetch();

        

        // Store data in session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $ID;
        $_SESSION["first_name"] = $first_name; 
        
        //echo $first_name;
        //echo $last_name;
        //echo $user;
        //echo $ID;
        $_SESSION["last_name"] = $last_name;
        $_SESSION["username"] = $user;

       header("location: fetchCar.php");
    }
    else {
        $login_error ="Invalid username or password! Unable to authenticate!";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Login Page</title>
</head>

<body>
    <h3 style="text-align: center; font-family:'Roboto',sans-serif; color: #4eb5f1; font-size: 45px;">Car Dealership Manager</h3>
    <div class="mainMenu" style="text-align: center; margin:auto;width: 50%; margin-top: 125px;">
        <table>
            <div>
               
               <form action="index.php" method="POST">
         <table style="margin-top: 10px;">
             <tr>
                 <td colspan="2"> <h3> Employee Login</h3> </td> </tr>
             
          <tr>
           <td>Username :</td>
           <td><input class="textBox" type="text" name="username" required></td></tr>
<tr>
           <td>Password :</td>
           <td><input class="textBox" type="password" name="userpass" required></td>
          </tr>
                  <tr>
           <td></td>
           <td><input class="textBox" type="submit" name="Login"></td>
          </tr>
                  
                     <?php

                   if (isset($login_error)){
                       
                       echo "<tr> <td colspan ='2' style='color: red'>".$login_error. "</td></tr>";
                   }
                   ?>  
                   </table>
                      
 
            </div>    
            </form>

        </table>
    </div>
    
</body>
</html>