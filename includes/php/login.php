<?php
session_start();
if (isset($_POST['login'])){
    include 'connection.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = md5($password);
    $valid = 0;
    $sql = "SELECT * FROM `customers` WHERE `customerUsername` = '$username' AND `customerPassword` = '$hash'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
        $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach($customer as $row){
                if($row['customerStatus'] == $valid){
                    $_SESSION["uid"] = $row["customerID"];
                    //  SUCCESS TO ACCESS IN OUR APPLICATION
                    echo 1;
                }else{
                    // NOT VALID TO ACCESS IN OUR APPLICATION OR RATHER THE ACCOUNT IS DISABLE
                    echo 2;
                }
            }
    }else{
        // NOT YET REGISTERED
        echo 0;
    }
}
?>