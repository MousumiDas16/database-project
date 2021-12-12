<?php
$servername = "localhost";
$dbusername = "carshop";
$dbpassword = "admin";
$db="carshop";
$port="3306";

// Create connection
$connection = new mysqli($servername, $dbusername, $dbpassword,$db, $port);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully..  <br/>";
?>