<?php
require('authenticate.php');
require('dbconnector.php');

if (isset($_GET['carID'])) {
    
}

$carID = $_GET['carID'];
echo $carID;

$Select = "SELECT car_ID FROM cars WHERE car_ID = ?";
$Delete = "DELETE from cars WHERE car_ID =?";
$stmt = $connection->prepare($Select);
$stmt->bind_param("i", $carID);
$stmt->execute();
$stmt->bind_result($resultcarID);
$stmt->store_result();
$stmt->fetch();
$rnum = $stmt->num_rows;
if ($rnum > 0) {
    $stmt->close();
    $stmt = $connection->prepare($Delete);
    $stmt->bind_param("i", $carID);
    if ($stmt->execute()) {                
                header("location: fetchCar.php?result=deleteSuccess");
            }
}
else
{
    //echo "not found";
    header("location: fetchCar.php?result=deleteFailed");
}


?>