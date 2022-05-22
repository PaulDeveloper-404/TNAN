<?php
	include('config.php');
    // MARK ORDER FROM THE TRANSACTION
    if(isset($_POST["prepare"])) {
		$prepare = $_POST["prepare"];
		$Preparing = "Preparing";
		$sql = "UPDATE `order_manager` SET `order_status` = '$Preparing' WHERE `order_id` = '$prepare'";
		$result= mysqli_query($con,$sql);
		if($result){
			echo 1;
			exit();
		}else{
			echo 0;
			exit();
		}
	}
	// MARK TO DELIVER FOOD
    if(isset($_POST["deliver"])) {
		$deliver = $_POST["deliver"];
		$Deliver = "To Deliver";
		$sql = "UPDATE `order_manager` SET `order_status` = '$Deliver' WHERE `order_id` = '$deliver'";
		$result= mysqli_query($con,$sql);
		if($result){
			echo 1;
			exit();
		}else{
			echo 0;
			exit();
		}
	}
	// MARK TO COMPLETE TRANSACTION
    if(isset($_POST["complete"])) {
		$complete = $_POST["complete"];
		$completed = "complete";
		$sql = "UPDATE `order_manager` SET `date_time_bought` = now(), `order_status` = '$completed' WHERE `order_id` = '$complete'";
		$result= mysqli_query($con,$sql);
		if($result){
			echo 1;
			exit();
		}else{
			echo 0;
			exit();
		}
	}
?>