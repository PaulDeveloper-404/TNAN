<?php
include('config.php');
// FETCH PRODUCT FROM DATABASE
if(isset($_POST["getComplaint"])){
	$limit = 12;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
    $sql = "SELECT a.customerID, a.customerName, b.complaint_id, b.userID, b.userComplaint, b.date_time, b.status FROM customers a, complaint b WHERE a.customerID = b.userID AND b.status = 0 ORDER BY complaint_id DESC";
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
		while($complaint = mysqli_fetch_array($result)){	
            $date_time = $complaint['date_time'];
            $newDate = date('F d, Y || h:i:a',strtotime($date_time));
            $complaintId = $complaint['complaint_id'];			
            $customer = $complaint['customerName'];
			$complaint = $complaint['userComplaint'];
			echo "
            <div class='col-6'>
                <div class='card mb-3'>
                    <div class='card-body'>
                        <input type='hidden' value='$complaintId'>
                        <p class='card-text text-secondary'>Submitted: $newDate</p>
                        <h5 class='card-title fw-bold'>By:$customer</h5>
                        <p class='card-text text-secondary'>$complaint</p>
                        <button type='button' onclick='complaint_btn($complaintId)' class='btn btn-sm btn-primary'>Feedback</button>
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
						<H3 class="text-center fw-bold">NO COMPLAINT</H3>
					</div>
				</div>
			</div>
		';
	}
// PAGE LIMIT FUNCTION
if(isset($_POST["page"])){
	$sql = "SELECT * FROM complaint";
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