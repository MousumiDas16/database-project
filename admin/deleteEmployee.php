<?php
require('authenticate.php');
require('dbconnector.php');

if (isset($_GET['empID'])) {
    
}

$empID = $_GET['empID'];
//echo $carID;

$Select = "SELECT employee_ID FROM employees WHERE employee_ID = ?";
$Delete = "DELETE from employees WHERE employee_ID =?";
$stmt = $connection->prepare($Select);
$stmt->bind_param("i", $empID);
$stmt->execute();
$stmt->bind_result($resultcarID);
$stmt->store_result();
$stmt->fetch();
$rnum = $stmt->num_rows;
if ($rnum > 0) {
    $stmt->close();
    $stmt = $connection->prepare($Delete);
    $stmt->bind_param("i", $empID);
    if ($stmt->execute()) {                
                header("location: fetchEmployee.php?result=deleteSuccess");
            }
}
else
{
    //echo "not found";
    header("location: fetchEmployee.php?result=deleteFailed");
}


?>
?>