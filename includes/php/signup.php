<?php
        include('connection.php');
        // NAME FROM THE FORM 
        $customerImage = 'default.png';  
        $customerName = $_POST['customerName'];
        $customerUsername = $_POST['customerUsername'];
        $customerPassword = $_POST['customerPassword'];
        $customerConPassword = $_POST['customerConPassword'];

        // Check if the User Name are already stored
        $exist = $con->query("SELECT * FROM `customers` WHERE `customerName` = '$customerName'");
        $result = $exist->fetch_assoc();
        if($result>0){
            echo "Sorry The account are already exist";
            exit();  
        }
        $exist2 = $con->query("SELECT * FROM `customers` WHERE `customerUsername` = '$customerUsername'");
        $result2 = $exist2->fetch_assoc();
        if($result2>0){
            echo "Sorry the username are already exist";
            exit();  
        }
        if(!preg_match("/^[a-zA-Z0-9]*$/", $customerUsername)){
          echo "Sorry Invalid Username";
          exit();
        }
        else{
            $customerPassword = md5($customerPassword);
            $newCustomer = $con->query("INSERT INTO `customers`(`customerImage`, `customerName`, `customerUsername`, `customerPassword`) 
            VALUES ('$customerImage','$customerName','$customerUsername','$customerPassword')");
            if($newCustomer){
              echo 1;
              exit();  
            }else{
              echo 0;
              exit();  
                  } 
          }
?>