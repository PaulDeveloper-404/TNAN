<?php
    session_start();
    $target_dir = "C:/xampp/htdocs/TNAN/admin/assets/customersPhoto/";
    $target_file = $target_dir . basename($_FILES["updateImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    require_once('connection.php');
    $updateImage = $_FILES["updateImage"]["name"];
    $updateID = $_POST['updateID'];
    $updateFname = $_POST["updateFname"];
    $updateAddress = $_POST["updateAddress"];
    $updateContact = $_POST["updateContact"];
    $updateEmail = $_POST["updateEmail"];

    if(!empty($_FILES['updateImage']["name"])){
        if(isset($_POST["updateBtn"])){
                $check = getimagesize($_FILES["updateImage"]["name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
             }
            // Check file size
            if ($_FILES["updateImage"]["size"] > 500000){
                echo "Sorry, the file is too large.";   
                $uploadOk = 0;
                exit();  
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";   
                $uploadOk = 0;
                exit();  
            }else {
            if (move_uploaded_file($_FILES["updateImage"]["tmp_name"], $target_file)) {
                    $password = $updatePassword;
                    $encode = base64_encode($password);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $sql = "UPDATE `customers` SET `customerImage` = '$updateImage', `customerName` = '$updateFname', `customerContact` = '$updateContact', `customerAddress` = 
                    '$updateAddress', `customerEmail` = '$updateEmail', WHERE `customerID` = '$updateID'";
                    $result = mysqli_query($con, $sql);
                    if($result){
                        move_uploaded_file($_FILES["updateImage"]["tmp_name"],$target_file);
                        echo 1;
                    }else{
                        echo 0;
                    }
                    mysqli_close($con);
                }
            }
        }else{    
            $sql = "UPDATE customers SET customerName = $updateFname, customerContact = $updateContact , customerAddress = $updateAddress, customerEmail = $updateEmail, WHERE customerID = $updateID ";
            $result = mysqli_query($con, $sql);
            if($result){
                echo 1;
            }else{
                echo 0;
            }
            mysqli_close($con);    
        }   
?>