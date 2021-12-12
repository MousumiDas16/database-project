<?php
require('authenticate.php');
require('dbconnector.php');

if (isset($_GET['customerID'])) {
    
}

$customerID = $_GET['customerID'];
//echo $carID;

$Select = "SELECT customer_ID FROM customers WHERE customer_ID = ?";
$Delete = "DELETE from customers WHERE customer_ID =?";
$stmt = $connection->prepare($Select);
$stmt->bind_param("i", $customerID);
$stmt->execute();
$stmt->bind_result($resultcarID);
$stmt->store_result();
$stmt->fetch();
$rnum = $stmt->num_rows;
if ($rnum > 0) {
    $stmt->close();
    $stmt = $connection->prepare($Delete);
    $stmt->bind_param("i", $customerID);
    if ($stmt->execute()) {                
                header("location: fetchCustomers.php?result=deleteSuccess");
            }
}
else
{
    //echo "not found";
    header("location: fetchCustomers.php?result=deleteFailed");
}


?>
?>