<?php
        session_start();
        include('config.php');
            $customerStatustID = $_POST['customerStatustID'];
            $dishStatus = $_POST['dishStatus'];
            $newStatus = 0;
            $sql = "UPDATE `customers` SET `customerStatus` = '$newStatus' WHERE `customerID` = '$customerStatustID'";
            $update = mysqli_query($con, $sql);
                if($update){
                    echo 1;
                }else{
                    echo 0;
                }
    ?>



