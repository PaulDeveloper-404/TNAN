<?php
    require_once('config.php');
    // NAME FROM THE FORM 
    $foodImage = $_FILES['foodImage']['name'];  
    $foodCategory = $_POST['foodCategory'];
    $foodName = $_POST['foodName'];
    $foodPrice = $_POST['foodPrice'];
    $foodStock = $_POST['foodStock'];
    $foodDescription = $_POST['foodDescription'];
    
        // Check if the Food are already exist
        $exist = "SELECT * FROM `food` WHERE `foodName` = '$foodName'";
        $result = $con->query($exist) or die($con->error);
        $food = $result->fetch_assoc();
    
        // Check if the Food name are already stored
        if($food>0){
            echo "Sorry, The food are already exist";
            exit();  
        }else{
            // Function for uploading foodImage
            $target_dir = "C:/xampp/htdocs/TNAN/admin/assets/foodPhoto/";
            $target_file = $target_dir . basename($_FILES["foodImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["foodImage"]["tmp_name"]);
    
            // Checking the image
            if($check !== false) {
            $uploadOk = 1;
            } else {
              echo "File is not an image.";
              $uploadOk = 0;
              exit();  
            }
            // Check file size
            if ($_FILES["foodImage"]["size"] > 500000) {
              echo "Sorry, your file is too large.";
              $uploadOk = 0;
              exit();  
            }
            // Allow certain file formats
            elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
              exit();  
            }
            // Check if $uploadOk is set to 0 by an error
            elseif($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
              exit();  
            } 
            // if everything is ok, try to upload file
            else {
                    $new = "INSERT INTO `food`(`foodImage`, `foodName`, `foodCategory`, `foodStock`, `foodDescription`, `foodPrice`) VALUES ('$foodImage','$foodName','$foodCategory', '$foodStock','$foodDescription','$foodPrice')";
                    $addfood = mysqli_query($con, $new);
                    if($addfood){
                      move_uploaded_file($_FILES["foodImage"]["tmp_name"],$target_file);
                      echo "New food Stored Successfully.";
                      exit();  
                    }else{
                      echo "Sorry, Registered Failed";
                      exit();  
                         } 
                  }
       }
?>