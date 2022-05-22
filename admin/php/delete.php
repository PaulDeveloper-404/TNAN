<?php
require_once('config.php');
// FUNCTION FOR REMOVE CANCEL REPORT
if(isset($_POST['deleteCancel'])){
	$deleteCancel = $_POST['deleteCancel'];
	$sql = "DELETE FROM `order_manager` WHERE `order_id` = '$deleteCancel'";
	$result = mysqli_query($con, $sql);
	if($result){
		echo 1;
		exit;
	}else{
		echo 0;
		exit;
	}
}

// FUNCTION FOR REMOVE COMPLETE REPORT
if(isset($_POST['deleteComplete'])){
	$deleteComplete = $_POST['deleteComplete'];
	$sql = "DELETE FROM `order_manager` WHERE `order_id` = '$deleteComplete'";
	$result = mysqli_query($con, $sql);
	if($result){
		echo 1;
		exit;
	}else{
		echo 0;
		exit;
	}
}


// FUNCTION FOR REMOVE DELETE ACCOUNT
if(isset($_POST['deleteCustomer'])){
	$deleteCustomer = $_POST['deleteCustomer'];
	$sql = "DELETE FROM `customers` WHERE `customerID` = '$deleteCustomer'";
	$result = mysqli_query($con, $sql);
	if($result){
		echo 1;
		exit;
	}else{
		echo 0;
		exit;
	}
}


// FUNCTION FOR REMOVE DELETE PRODUCT
if(isset($_POST['deleteProduct'])){
	$deleteProduct = $_POST['deleteProduct'];
	$oldImage = "SELECT `foodImage` FROM `food` WHERE `foodID` = '$deleteProduct'";
	$result = mysqli_query($con, $oldImage);
	if(mysqli_num_rows($result)>0){
		{
			$foodImage = mysqli_fetch_array($result);
			unlink("C:/xampp/htdocs/TNAN/admin/assets/foodPhoto/".$foodImage[0]);
			$sql = "DELETE FROM `food` WHERE `foodID` = '$deleteProduct'";
			$result = mysqli_query($con, $sql);
			if($result){
				echo 1;
				exit;
			}else{
				echo 0;
				exit;
			}
		}
	}
}

?>