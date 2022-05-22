<?php

include('connection.php');
$target_dir = "C:/xampp/htdocs/TNAN/admin/assets/announcementPhoto/";
$target_file = $target_dir . basename($_FILES["annnouncementImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$annnouncementImage = $_FILES["annnouncementImage"]["name"];
$announcement = $_POST['announcement'];

// VALID UNTIL DATE
$valid_until = $_POST['valid_until'];

// CURRENT DATE
date_default_timezone_set("asia/manila");
$currentDate = date("Y-m-d");

    if($currentDate >= $valid_until){
        echo "Not valid";
    }else{
     if(!empty($_FILES['annnouncementImage']["name"])){
                 $check = getimagesize($_FILES["annnouncementImage"]["name"]);
                 if($check !== false) {
                     $uploadOk = 1;
                 } else {
                     $uploadOk = 0;
                 }
             // Check file size
             if ($_FILES["annnouncementImage"]["size"] > 500000) 
             {
                 echo "Sorry, the file is too large.";   
                 $uploadOk = 0;
                 exit();  
             }
             // Allow certain file formats
             if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
             {
                 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";   
                 $uploadOk = 0;
                 exit();  
             }
             else {
             if (move_uploaded_file($_FILES["annnouncementImage"]["tmp_name"], $target_file)) {
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $sql = "INSERT INTO `announcement_tbl` (`announcement_image`, `announcement`, `date_time`, `valid_until`) VALUES ('$annnouncementImage', '$announcement' , now() ,'$valid_until')";
                $result = mysqli_query($con, $sql);
                if($result){
                    move_uploaded_file($_FILES["annnouncementImage"]["tmp_name"],$target_file);
                    echo 1;
                }else{
                    echo 0;
                }
                mysqli_close($con);
                 }
             }
        }else{
            $sql = "INSERT INTO `announcement_tbl` (`announcement_image`, `announcement`, `date_time`, `valid_until`) VALUES ('horn.jpg', '$announcement' , now() ,'$valid_until')";
            $result = mysqli_query($con, $sql);
                if($result){
                    echo 1;
                }else{
                    echo 0;
                }
                mysqli_close($con);
    }
}
?>