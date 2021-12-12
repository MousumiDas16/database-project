<?php
session_start();

if (!isset( $_SESSION["loggedin"]) &&  !$_SESSION["loggedin"] == true)
{
     header("location: index.php");
}

$first_name =$_SESSION["first_name"];
$last_name =$_SESSION["last_name"];
$username = $_SESSION["username"];
$userid = $_SESSION["id"];

?>