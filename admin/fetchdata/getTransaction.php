<?php
include('config.php');

// ORDER
	if(isset($_POST["getOrder"])){
		$limit = 12;
		if(isset($_POST["setPage"])){
			$pageno = $_POST["pageNumber"];
			$start = ($pageno * $limit) - $limit;
		}else{
			$start = 0;
		}
		$Order = 'Order';
		$product_query = "SELECT a.order_id, a.user_id, a.total_amount, a.payment_option, a.order_status, b.order_id, b.product, b.quantity, b.total, b.date_time_bought, c.customerID, c.customerName , d.foodID , d.foodName, d.foodDescription FROM order_manager a , user_orders b , customers c , food d
		WHERE a.order_status = '$Order' AND a.order_id = b.order_id AND a.user_id = c.customerID AND b.product = d.foodID";
		$run_query = mysqli_query($con,$product_query);
		if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query)){	
				$order_id   = $row['order_id'];
				$customerName = $row['customerName'];
				$payment_option = $row['payment_option'];
				$product = $row['product'];
				$quantity = $row['quantity'];
				$foodName = $row['foodName'];
				$foodDescription = $row['foodDescription'];
				$total_amount = $row['total_amount'];
				$total = $row['total'];
				$deliveryFee = $total + 50;
				$date_time_bought = $row['date_time_bought'];
				$new_date = date('F d, Y || h:i:A',strtotime($date_time_bought));
				echo "
				<div class='col-3 mb-4'>		
					<div class='card' style='width: 18rem;' >
						<div class='card-header text-center' style='background-color:#826F66;'>
							<p class='card-text text-white'>ORDERED DETAILS</p>
						</div>
						<div class='card-body' style='line-height:18px;'>
							<h5 class='card-title fw-bold my-3' style='text-transform:Uppercase;'>$customerName</h5>
							<p class='card-text'>Order: x$quantity of $foodName</p>
							<p class='card-text'>Ordered On: $new_date</p>
							<p class='card-text'>Total: ₱$total.00 + Delivery Fee ₱50.00</p>
							<p class='card-text'>Total Amount: <span class='fw-bold'>₱$deliveryFee.00</span></p>
							<p class='card-text text-secodary'>Option: $payment_option</p>
						</div>
						<button onclick=marked('$order_id') style='background-color:#826F66;' class='btn btn-sm text-white py-2 mt-3'>PREPARE NOW <i class='fas fa-arrow-right'></i></button>
					</div>
				</div> 
				";
			}
		}else{
			echo'
				<div class"container">
					<div class="row my-5 py-5">
						<div class="col-12 my-5 py-5">
							<H3 class="text-center fw-bold">NO ORDER YET</H3>
						</div>
					</div>
				</div>
			';
		}
	// PAGE LIMIT FUNCTION
	if(isset($_POST["page"])){
		$sql = "SELECT * FROM user_orders";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		$pageno = ceil($count/12);
		for($i=1;$i<=$pageno;$i++){
			echo "
				<li class='nav-item mx-1 '><a style='list-style:none; ' class='btn btn-sm btn-outline-secondary px-3' page='$i' id='page'>$i</a></li>
			";
		}
	}
	}
// ORDER

// PREPARE
	if(isset($_POST["getPrepare"])){
		$limit = 12;
		if(isset($_POST["setPage"])){
			$pageno = $_POST["pageNumber"];
			$start = ($pageno * $limit) - $limit;
		}else{
			$start = 0;
		}
		$Preparing = 'Preparing';
		$product_query = "SELECT a.order_id, a.user_id, a.total_amount, a.payment_option, a.order_status, b.order_id, b.product, b.quantity, b.total, b.date_time_bought, c.customerID, c.customerName , c.customerContact, c.customerAddress, d.foodID , d.foodName, d.foodDescription FROM order_manager a , user_orders b , customers c , food d
		WHERE a.order_status = '$Preparing' AND a.order_id = b.order_id AND a.user_id = c.customerID AND b.product = d.foodID";
		$run_query = mysqli_query($con,$product_query);
		if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query)){	
				$order_id   = $row['order_id'];
				$customerName = $row['customerName'];
				$payment_option = $row['payment_option'];
				$product = $row['product'];
				$quantity = $row['quantity'];
				$foodName = $row['foodName'];
				$foodDescription = $row['foodDescription'];
				$customerContact = $row['customerContact'];
				$customerAddress = $row['customerAddress'];
				$total = $row['total'];
				$total_amount = $total + 50;
				$date_time_bought = $row['date_time_bought'];
				$new_date = date('F d, Y || h:i:A',strtotime($date_time_bought));
				echo "
				<div class='col-4 mb-4'>		
					<div class='card'>
						<div class='card-header text-center' style='background-color:#826F66;'>
							<p class='card-text text-white'>ORDERED DETAILS</p>
						</div>
						<div class='card-body' style='line-height:14px;'>
							<h5 class='card-title fw-bold my-3'>Order: x$quantity of $foodName</h5>
							<p class='card-text'>Ordered On: $new_date</p>
							<p class='card-text'>Fullname: $customerName</p>
							<p class='card-text'>Contact: $customerContact</p>
							<p class='card-text' style='line-height:20px;'>Address: $customerAddress</p>
							<p class='card-text'>Total Amount: <span class='fw-bold'>₱$total_amount.00</span></p>
							<p class='card-text text-secodary'>Option: $payment_option</p>
						</div>
						<button onclick=deliver('$order_id') style='background-color:#826F66; cursor:pointer;' class='btn btn-sm text-white py-2 mt-3'>DELIVER NOW <i class='fas fa-arrow-right'></i></button>
					</div>
				</div> 
				";
			}
		}else{
			echo'
				<div class"container">
					<div class="row my-5 py-5">
						<div class="col-12 my-5 py-5">
							<H3 class="text-center fw-bold"> NO PREPARING FOR NOW  </H3>
						</div>
					</div>
				</div>
			';
		}
	// PAGE LIMIT FUNCTION
	if(isset($_POST["page"])){
		$sql = "SELECT * FROM user_orders";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		$pageno = ceil($count/12);
		for($i=1;$i<=$pageno;$i++){
			echo "
				<li class='nav-item mx-1 '><a style='list-style:none; ' class='btn btn-sm btn-outline-secondary px-3' page='$i' id='page'>$i</a></li>
			";
		}
	}
	}
// PREPARE

// DELIVER
	if(isset($_POST["getDeliver"])){
		$limit = 12;
		if(isset($_POST["setPage"])){
			$pageno = $_POST["pageNumber"];
			$start = ($pageno * $limit) - $limit;
		}else{
			$start = 0;
		}
		$Deliver = 'To Deliver';
		$product_query = "SELECT a.order_id, a.user_id, a.total_amount, a.payment_option, a.order_status, b.order_id, b.product, b.quantity, b.total, b.date_time_bought, c.customerID, c.customerName , c.customerContact, c.customerAddress, d.foodID , d.foodName, d.foodDescription FROM order_manager a , user_orders b , customers c , food d
		WHERE a.order_status = '$Deliver' AND a.order_id = b.order_id AND a.user_id = c.customerID AND b.product = d.foodID";
		$run_query = mysqli_query($con,$product_query);
		if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query)){	
				$order_id   = $row['order_id'];
				$customerName = $row['customerName'];
				$payment_option = $row['payment_option'];
				$product = $row['product'];
				$quantity = $row['quantity'];
				$foodName = $row['foodName'];
				$foodDescription = $row['foodDescription'];
				$customerContact = $row['customerContact'];
				$customerAddress = $row['customerAddress'];
				$total = $row['total'];
				$total_amount = $total + 50;
				$date_time_bought = $row['date_time_bought'];
				$new_date = date('F d, Y || h:i:A',strtotime($date_time_bought));
				echo "
				<div class='col-4 mb-4'>		
					<div class='card'>
						<div class='card-header' style='background-color:#826F66;'>
							<p class='card-text text-center text-white'>TO DELIVER</p>
						</div>
						<div class='card-body' style='line-height:14px;'>
							<h5 class='card-title fw-bold my-3'>Order: x$quantity of $foodName</h5>
							<p class='card-text'>Fullname: $customerName</p>
							<p class='card-text'>Contact: $customerContact</p>
							<p class='card-text' style='line-height:20px;'>Address: $customerAddress</p>
							<p class='card-text'>Total Amount: <span class='fw-bold'>₱$total_amount.00</span></p>
							<p class='card-text text-secodary'>Option: $payment_option</p>
						</div>
						<p class='card-text text-center mt-3 py-2 text-white' style='background-color:#826F66;'>WAIT FOR THE RESPONSE</p>
					</div>
				</div> 
				";
			}
		}else{
			echo'
				<div class"container">
					<div class="row my-5 py-5">
						<div class="col-12 my-5 py-5">
							<H3 class="text-center fw-bold"> ALL PRODUCT HAS BEEN DELIVER</H3>
						</div>
					</div>
				</div>
			';
		}
	// PAGE LIMIT FUNCTION
	if(isset($_POST["page"])){
		$sql = "SELECT * FROM user_orders";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		$pageno = ceil($count/12);
		for($i=1;$i<=$pageno;$i++){
			echo "
				<li class='nav-item mx-1 '><a style='list-style:none; ' class='btn btn-sm btn-outline-secondary px-3' page='$i' id='page'>$i</a></li>
			";
		}
	}
	}
// DELIVER

// RECEIVE
	if(isset($_POST["getReceived"])){
		$limit = 12;
		if(isset($_POST["setPage"])){
			$pageno = $_POST["pageNumber"];
			$start = ($pageno * $limit) - $limit;
		}else{
			$start = 0;
		}
		$Received = 'Received';
		$product_query = "SELECT a.order_id, a.user_id, a.total_amount, a.payment_option, a.order_status, b.order_id, b.product, b.quantity, b.total, b.date_time_bought, c.customerID, c.customerName , c.customerContact, c.customerAddress, d.foodID , d.foodName, d.foodDescription FROM order_manager a , user_orders b , customers c , food d
		WHERE a.order_status = '$Received' AND a.order_id = b.order_id AND a.user_id = c.customerID AND b.product = d.foodID";
		$run_query = mysqli_query($con,$product_query);
		if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query)){	
				$order_id   = $row['order_id'];
				$customerName = $row['customerName'];
				$payment_option = $row['payment_option'];
				$product = $row['product'];
				$quantity = $row['quantity'];
				$foodName = $row['foodName'];
				$foodDescription = $row['foodDescription'];
				$customerContact = $row['customerContact'];
				$customerAddress = $row['customerAddress'];
				$total = $row['total'];
				$total_amount = $total + 50;
				$date_time_bought = $row['date_time_bought'];
				$new_date = date('F d, Y',strtotime($date_time_bought));
				echo "
				<div class='col-3 mb-4'>
				<div class='card' style='width: 18rem;'>
				<div class='card-header text-center' style='background-color:#826F66;'>
					<p class='card-text text-white'>ORDERED DETAILS</p>
				</div>
				<div class='card-body bg-white text-dark'>
					<h5 class='card-title fw-bold my-3' style='text-transform:Uppercase;'>$customerName</h5>
					<p class='card-text'>Order: x$quantity of $foodName</p>
					<p class='card-text'>Ordered On: ₱$total_amount.00</p>
					<p class='card-text'>Total: $new_date</p>
					<p class='card-text text-secodary' style='text-transform:Uppercase;'>$payment_option</p>
				</div>
					<button onclick=complete('$order_id') style='background-color:#826F66; cursor:pointer;' class='text-white btn btn-sm p-2'>COMPLETED</button>
				</div>
				</div>
				";
			}
		}else{
			echo'
				<div class"container">
					<div class="row my-5 py-5">
						<div class="col-12 my-5 py-5">
							<H3 class="text-center fw-bold">ALL PRODUCT HAS BEEN RECEIVE </H3>
						</div>
					</div>
				</div>
			';
		}
	// PAGE LIMIT FUNCTION
	if(isset($_POST["page"])){
		$sql = "SELECT * FROM user_orders";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		$pageno = ceil($count/12);
		for($i=1;$i<=$pageno;$i++){
			echo "
				<li class='nav-item mx-1 '><a style='list-style:none; ' class='btn btn-sm btn-outline-secondary px-3' page='$i' id='page'>$i</a></li>
			";
		}
	}
	}
// RECEIVE

// COMPLETE
	if(isset($_POST['getCompleted'])){
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
				$grand_total = $total_amount + 50;
				$date_time_bought = $row['date_time_bought'];
				$new_date = date('F d, Y',strtotime($date_time_bought));
				echo "
				<tr>
					<td>$order_id</td>
					<td>$customerName</td>
					<td>$grand_total</td>
					<td>$new_date</td>
					<td>$payment_option</td>
					<td><button class='btn btn-sm btn-danger' type='button' onclick='deleteComplete($order_id)'>DELETE</button></td>
				</tr>
				";
			}
		}else {
			echo "
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>NO DATA FOUND</td>
						<td></td>
						<td></td>
					</tr>
			";
		}
	}
// COMPLETE

// DELIVER
	if(isset($_POST["getCancel"])){
		error_reporting(0);
		$Cancel = 'Cancel';
		$product_query = "SELECT a.order_id, a.user_id, a.total_amount, a.payment_option, a.order_status, b.order_id, b.product, b.quantity, b.total, b.date_time_bought, c.customerID, c.customerName , c.customerContact, c.customerAddress, d.foodID , d.foodName, d.foodDescription FROM order_manager a , user_orders b , customers c , food d
		WHERE a.order_status = '$Cancel' AND a.order_id = b.order_id AND a.user_id = c.customerID AND b.product = d.foodID";
		$run_query = mysqli_query($con,$product_query);
		if(mysqli_num_rows($run_query) > 0){
			while($row = mysqli_fetch_array($run_query)){
				$n++;	
				$order_id   = $row['order_id'];
				$customerName = $row['customerName'];
				$foodName = $row['foodName'];
				echo "
				<tr>
					<td>$n</td>
					<td>$foodName</td>
					<td>$customerName</td>
					<td><button class='btn btn-sm btn-danger' type='button' onclick='deleteCancel($order_id)'>DELETE</button></td>
				</tr>
				";
			}
		}else{
			echo'
				<tr>
					<td></td>
					<td>NO DATA FOUND</td>
					<td></td>
					<td></td>
				</tr>
			';
		}
	}
// DELIVER

?>