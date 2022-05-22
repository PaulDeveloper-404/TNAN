<?php
include 'config.php';
$sessionID = $_SESSION['uid'];
$sql = "SELECT * FROM `customers` WHERE `customerID` = '$sessionID'";
$result = mysqli_query($con,$sql);
$profileArray = array();
    if(mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_assoc($result)){
            array_push($profileArray, $rows);
        }
    }
echo json_encode($profileArray);
?>
