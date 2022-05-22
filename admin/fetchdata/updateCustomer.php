<?php
include 'config.php';
session_start();
$sql = "SELECT * FROM `customers` WHERE `customerID` = '$_SESSION[uid]'";
$result = mysqli_query($con,$sql);
$customerArray = array();
    if(mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_assoc($result)){
            array_push($customerArray, $rows);
        }
    }
echo json_encode($customerArray);
?>      
