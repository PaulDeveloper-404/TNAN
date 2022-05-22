<?php
    session_start();    
    require_once('connection.php');
    $payment_option = $_POST['payment_option'];
    $total_amount = $_POST['total_amount'];
    $foodID = $_POST['foodID'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];
    $price = $_POST['price'];


        $sql = "SELECT * FROM `customers` WHERE `customerID` = '$_SESSION[uid]'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                if($row['customerName'] == "" || $row['customerContact'] == "" || $row['customerAddress'] == "" || $row['customerEmail'] == ""){
                    echo 2;
                    exit(0);
                }else{
                    $sql = "INSERT INTO `order_manager` (`user_id`, `total_amount`, `payment_option`, `date_time_bought`, `order_status`)
                    VALUES ('$_SESSION[uid]', '$total_amount', '$payment_option', now(), 'Order')";
                    $result = mysqli_query($con,$sql);
                    if($result){
                        foreach($foodID as $index => $productId){
                            $f_productId = $productId;
                            $f_quantity = $quantity[$index];
                            $f_total = $total[$index];
                            $f_price = $price[$index];
                            $order_id = mysqli_insert_id($con);
            
                            $sql2 = "INSERT INTO `user_orders` (`order_id`, `product`, `product_price` ,`quantity`, `total`, `date_time_bought`) 
                            VALUES ('$order_id','$f_productId', '$f_price' ,'$f_quantity','$f_total',now())";            
                            $result2 = mysqli_query($con,$sql2);
            
                            $sql3 = "UPDATE `food` SET `foodStock` = `foodStock` - '$f_quantity' WHERE `foodID` = '$f_productId'";
                            $result3 = mysqli_query($con,$sql3);
                        }
                        if($result2 && $result3){
                             $sql4 = "DELETE FROM cart WHERE user_id = $_SESSION[uid]";
                             $result4 = mysqli_query($con,$sql4);
                             if($result4){
                                 echo 1;
                                 exit();
                             }else{
                                 echo 0;
                                 exit();
                             }
                        }else{
                             echo "error";
                             exit();
                        }
                    }
                }            
            }
        }

?>