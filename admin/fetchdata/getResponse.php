<?php
include('config.php');
// FETCH PRODUCT FROM DATABASE
if(isset($_POST["getResponse"])){
	$limit = 12;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$Deleted = 0;
	$sql = "SELECT a.customerID, a.customerName, b.complaint_id, b.userID, b.userComplaint, b.status, c.complaintID, c.user_Id, c.message, c.date_time, c.is_deleted FROM customers a, complaint b, inbox c WHERE a.customerID = b.userID AND a.customerID = c.user_Id AND b.complaint_id = c.complaintID AND b.status = 1 ORDER BY `complaint_id` DESC";
	$result = mysqli_query($con,$sql) or die($con->error);
	if(mysqli_num_rows($result) > 0){
		echo "
		<div class='row mb-3'>
			<div class='col-3 ms-auto'>
				<form class='d-flex'>
					<input id='search' class='form-control me-2' type='search' placeholder='Search Here'>
					<button id='search_btn' class='btn btn-outline-success' type='submit'>Search</button>    
				</form>
		  </div>
		</div>
		";
		while($response = mysqli_fetch_array($result)){	
            $date_time = $response['date_time'];
            $response_dt = date('F d, Y || h:i:a',strtotime($date_time));
            $customerName = $response['customerName'];			
            $complaintId = $response['complaint_id'];			
            $userComplaint = $response['userComplaint'];			
            $message = $response['message'];			
			echo "
            <div class='col-6'>
                <div class='card mb-3'>
                    <div class='card-body'>
                        <input type='hidden' value='$complaintId'>
						<p class='card-text text-secondary'>Responsed: $response_dt</p>
                        <h5 class='card-title fw-bold'>To: $customerName,</h5>
                        <p class='card-text text-dark'>Complaint: $userComplaint</p>
                        <p class='card-title text-dark'>Feedback: $message</p>
                    </div>
                </div>
            </div>
			";
		}
	}else{
		echo'
			<div class"container">
				<div class="row my-3 py-5">
					<div class="col-12 my-5 py-5">
						<H3 class="text-center fw-bold">NO RESPONSE YET</H3>
					</div>
				</div>
			</div>
		';
	}
// PAGE LIMIT FUNCTION
if(isset($_POST["page"])){
	$sql = "SELECT * FROM inbox";
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

?>