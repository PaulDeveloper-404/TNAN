<?php
        session_start();
        include('connection.php');
        $user_id = $_POST['user_id'];
        $user_complaint = $_POST['user_complaint'];
    
        $sql = "INSERT INTO `complaint`(`userID`, `userComplaint`, `date_time`) 
        VALUES ('$user_id','$user_complaint',now())";
        $result = mysqli_query($con, $sql);
        if($result){
            echo 1;
        }else{
            echo 0;
                } 
?>