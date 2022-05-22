<?php
        session_start();
        include('config.php');
        $user_id = $_POST['user_id'];
        $complaint_id = $_POST['complaint_id'];
        $feedback = $_POST['feedback'];
        
        $newStatus = 1;
        $notDeleted = 0;

        $sql = "INSERT INTO `inbox`(`user_Id`, `complaintID`, `message`, `date_time` , `is_deleted`) VALUES ('$user_id', '$complaint_id', '$feedback', now() ,'$notDeleted')";
        $result = mysqli_query($con, $sql);
        if($result){
            $sql2 = "UPDATE `complaint` SET `status`='$newStatus' WHERE `complaint_id` =  '$complaint_id'";
            $result2 = mysqli_query($con, $sql2);
                if($result2){
                    echo 1;
                }
        }else{
            echo 0;
                } 
?>