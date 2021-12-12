<?php
session_start();
$con = mysqli_connect("localhost","root","","test");

if(isset($_POST['deleteCustomer_btn']))
{
    $id = $_POST['deleteCustomer'];

    $query = "DELETE FROM customer WHERE customerID='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Deleted Successfully";
        header("Location: fetchCustomer.php");
    }
    else
    {
        $_SESSION['status'] = "Data Not Deleted";
        header("Location: fetchCustomer.php");
    }
}

?>