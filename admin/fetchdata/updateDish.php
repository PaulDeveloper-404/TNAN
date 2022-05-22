<?php
include 'config.php';
$foodID = $_POST['foodID'];
$sql = "SELECT * FROM `food` WHERE `foodID` = '$foodID'";
$result = mysqli_query($con,$sql);
$foodArray = array();
    if(mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_assoc($result)){
            array_push($foodArray, $rows);
        }
    }
echo json_encode($foodArray);
?>
