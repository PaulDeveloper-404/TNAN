    <?php
    include('connection.php');
    $sql = "SELECT * FROM `announcement`";
	$result = mysqli_query($con,$sql) or die($con->error);
	if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_array($result)){
        // CURRENT DATE FROM MANILA
		date_default_timezone_set("asia/manila");
		$currentdate = date("F d, Y");
		// VALID UNTIL / DATE EXPIRATION
		$announcement_id  = $row['announcement_id'];
		$valid_until  = $row['valid_until'];
		$end_date = date('F d, Y',strtotime($valid_until));
        if($currentdate == $end_date){
           $sql2 = "DELETE FROM `announcement` WHERE `announcement_id` = '$announcement_id'";  
           $result2 = mysqli_query($con,$sql2) or die($con->error);
           if($result2){
               echo 1;
           }
        }
    }
}
    ?>
