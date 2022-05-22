<?php
include('config.php');
// FETCH PRODUCT FROM DATABASE
if(isset($_POST["getAnnouncement"])){
	$limit = 12;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
    $sql = "SELECT * FROM `announcement` ORDER BY `announcement_id` DESC";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) > 0){
            echo '
            <div class="row">
                <div class="col-9">
                    <button type="button" class="btn btn-outline-dark mx-3" data-bs-toggle="modal" data-bs-target="#announcementModal"><i class="fas fa-plus px-1"></i>CREATE NEW ANNOUNCEMENT</button>
                </div>
                <div class="col-3">
                    <form class="d-flex">
                        <input id="search" class="form-control me-2" type="search" placeholder="Search Here">
                        <button id="search_btn" class="btn btn-outline-success" type="submit">Search</button>    
                    </form>
                </div>
            </div>
            ';
		while($announcement = mysqli_fetch_array($result)){	
            $announcement_id = $announcement['announcement_id'];
            $announcement_image = $announcement['announcement_image'];

            // VALID POST
            $valid_Date = $announcement['valid_until'];
            $expire = date('F d, Y || h:i:A ',strtotime($valid_Date));

            // DATE POST
            $date_time = $announcement['date_time'];
            $datePost = date('F d, Y',strtotime($date_time));
            $announcement = $announcement['announcement'];
			echo "
            <div class='col-12 mt-4'>
                <div class='card mb-3'>
                    <div class='row g-0'>
                        <div class='col-md-4'>
                            <img src='/TNAN/admin/assets/announcementPhoto/$announcement_image' class='img-fluid rounded-start' alt='...'>
                        </div>
                        <div class='col-md-7'>
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-10'>
                                    <h5 class='card-title'>Valid until: $expire</h5>
                                    <p class='card-text'>$announcement</p>
                                    <p class='card-text'><small class='text-muted'>Posted On: $datePost</small></p>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class='col-md-1'>
                             <button type='button' onclick='deleteAnnouncement($announcement_id)' style='height:100%; width:100%;' class='btn btn-danger'>DELETE</button>
                        </div>
                    </div>
                </div>
            </div>
			";
		}
	}else{
		echo'
			<div class"container">
				<div class="row mt-5 pt-5">
					<div class="col-12 mt-5 pt-5">
						<H3 class="text-center fw-bold"> NO ANNOUNCEMENT DISPLAY</H3>
                    </div>
                    </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="text-center btn btn-sm btn-primary mt-3 py-2 px-4" data-bs-toggle="modal" data-bs-target="#announcementModal"><i class="fas fa-plus px-1"></i>CREATE NEW ANNOUNCEMENT</button>
                    </div>
                </div>
			</div>
		';
	}
// PAGE LIMIT FUNCTION
if(isset($_POST["page"])){
	$sql = "SELECT * FROM announcement";
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