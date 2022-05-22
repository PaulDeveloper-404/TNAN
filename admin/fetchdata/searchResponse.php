<?php
include('config.php');
// SEARCH FUNCTION
if(isset($_POST["search"])){
	if(isset($_POST["search"])){
		$keyword = $_POST["keyword"];
        $sql = "SELECT * FROM `complaint` INNER JOIN `inbox` ON complaint.complaint_id = inbox.complaintID";
        $result = mysqli_query($con,$sql);
	}if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){
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
		echo "
			<div class='alert bg-light text-danger text-center' role='alert'><h5>NO DATA FOUND</h5></div>
		";
	}
}

?>