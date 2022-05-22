<?php
include('config.php');
if(isset($_POST['getSales'])){
    $sql1 = "SELECT SUM(total_amount) AS total FROM `order_manager`";
    $result1 = mysqli_query($con, $sql1) or die($con->error);
    if(mysqli_num_rows($result1) > 0){
        while($row = mysqli_fetch_assoc($result1)){
            $total_amount = $row['total'];
            echo "₱$total_amount";
        }
    }else{
        echo "0";
    }
}
?>