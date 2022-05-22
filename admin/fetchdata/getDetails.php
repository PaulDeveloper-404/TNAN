<?php
// COMPLETE
include ('config.php');
if(isset($_POST['getDetails'])){
	$Complete = 'Complete';
	$product_query = "SELECT a.order_id, a.user_id, a.total_amount, a.payment_option, a.order_status, b.order_id, b.product, b.quantity, b.total, b.date_time_bought, c.customerID, c.customerName FROM order_manager a , user_orders b , customers c WHERE a.order_status = '$Complete' AND a.order_id = b.order_id AND a.user_id = c.customerID LIMIT 6";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){	
			$order_id   = $row['order_id'];
			$customerName = $row['customerName'];
			$payment_option = $row['payment_option'];
			$product = $row['product'];
			$quantity = $row['quantity'];
			$total_amount = $row['total_amount'];
			$date_time_bought = $row['date_time_bought'];
			$new_date = date('F d, Y || h:i:a',strtotime($date_time_bought));
			echo "
				<tr>
					<td>$order_id</td>
					<td>$customerName</td>
					<td>$total_amount</td>
					<td>$new_date</td>
					<td>$payment_option</td>
				</tr>
			";
		}
	}else {
		echo "
				<tr>
					<td></td>
					<td></td>
					<td>NO DATA TRANSACTION YET</td>
					<td></td>
					<td></td>
				</tr>
		";
	}
}
?>