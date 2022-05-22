<?php
include 'config.php';
$foodStatusID = $_POST['foodStatusID'];
$sql = "SELECT * FROM `food` WHERE `foodID` = '$foodStatusID'";
$result = mysqli_query($con,$sql);
$foodArray = array();
    if(mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_assoc($result)){
            array_push($foodArray, $rows);
        }
    }
echo json_encode($foodArray);
?>
