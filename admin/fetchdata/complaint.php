<?php
include 'config.php';
$complaintID = $_POST['complaintID'];
$sql = "SELECT * FROM `customers` WHERE `customerID` = '$complaintID'";
$result = mysqli_query($con,$sql);
$complaintArray = array();
    if(mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_assoc($result)){
            array_push($complaintArray, $rows);
        }
    }
echo json_encode($complaintArray);
?>
