<?php
include 'config.php';
$complaintID = $_POST['complaintID'];
$sql = "SELECT a.complaint_id, a.userID, b.customerID FROM complaint a , customers b  WHERE a.userID = b.customerID AND a.complaint_id = '$complaintID'";
$result = mysqli_query($con,$sql);
$complaintArray = array();
    if(mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_assoc($result)){
            array_push($complaintArray, $rows);
        }
    }
echo json_encode($complaintArray);
?>
