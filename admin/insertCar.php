<?php
require('authenticate.php');
require('dbconnector.php');

if (isset($_POST['submit'])) {
    if (isset($_POST['carID']) && isset($_POST['make']) &&
        isset($_POST['model']) && isset($_POST['trim']) &&
        isset($_POST['price']) && isset($_POST['mileage']) && 
        isset($_POST['engine']) && isset($_POST['dateAdded']) && 
        isset($_POST['transmission']) && isset($_POST['color']) && 
        isset($_POST['carCondition']) && isset($_POST['bodytype'])
        && isset($_POST['year'])
        ) 
        {
        
        $dbID=  $_POST['dbID'];
        if($dbID==-1)
        {
            $mode="ADD";
        }
        else 
        { 
            $mode="EDIT";
        }
        
        $VIN = $_POST['carID'];
        $make = $_POST['make'];
        $model = $_POST['model'];
        $trim = $_POST['trim'];
        $price = $_POST['price'];
        $mileage = $_POST['mileage'];
        $engine = $_POST['engine'];
        $dateAdded = $_POST['dateAdded'];
        $transmission = $_POST['transmission'];
        $color = $_POST['color'];
        $carCondition = $_POST['carCondition'];
        $bodytype = $_POST['bodytype'];
        $year = $_POST['year'];
        $carDescription = $_POST['carDescription'];
        $status=1;

        
        if($mode=="ADD"){
            $Select = "SELECT car_ID FROM cars WHERE VIN = ?";
            $Insert = "INSERT INTO cars(inventory_manager_ID, car_make, car_model, car_year, car_trim,".
                " car_price,car_mileage, car_engine, car_transmission,car_color, car_body_type, car_condition,".
                " car_description, VIN, car_status, date_added) values(?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?)";
            $stmt = $connection->prepare($Select);
            $stmt->bind_param("s", $VIN);
            $stmt->execute();
            $stmt->bind_result($resultcarID);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $connection->prepare($Insert);
                $stmt->bind_param("issisdisssssssis",$userid, $make, $model, $year, $trim,$price,$mileage,
            $engine,$transmission,$color, $bodytype, $carCondition, $carDescription,$VIN, $status, $dateAdded);
                if ($stmt->execute()) {
                    //echo "New record inserted sucessfully.";
                    header("location: fetchCar.php?result=insertSuccess");
                }
                else {
                    header("location: fetchCar.php?result=insertFailed");
                }
            }
        }
        else if ($mode =="EDIT"){
            //$Select = "SELECT car_ID FROM cars WHERE VIN = ?";
            $EDIT = "UPDATE cars set  car_make=?, car_model =?, car_year =?, car_trim =?,".
            " car_price =?,car_mileage =?, car_engine=?, car_transmission=?,car_color=?, car_body_type =?, car_condition=?,".
            " car_description =?, VIN=?, car_status=?, date_added =? WHERE car_ID=?";
            
            $stmt = $connection->prepare($EDIT);
                $stmt->bind_param("ssisdisssssssisi", $make, $model, $year, $trim,$price,$mileage,
            $engine,$transmission,$color, $bodytype, $carCondition, $carDescription,$VIN, $status, $dateAdded,$dbID);
                if ($stmt->execute()) {
                    //echo "New record inserted sucessfully.";
                    header("location: fetchCar.php?result=editSuccess");
                }
            
        }
       
        $stmt->close();
        $connection->close();
        
    }
    else {
        echo "All field are required CAR.";
        die();
    }
}
else {
    echo "Submit button is not set";
}

?>