<?php
session_start();
if (isset($_POST['adminLogin'])){
    include 'connection.php';
    $adminUsername = $_POST['adminUsername'];
    $adminPassword = $_POST['adminPassword'];
    $sql = "SELECT * FROM `admin` WHERE `adminUsername` = '$adminUsername' AND `adminPassword` = '$adminPassword'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
       echo 1;
    }else{
        echo 0;
    }
}
?>

