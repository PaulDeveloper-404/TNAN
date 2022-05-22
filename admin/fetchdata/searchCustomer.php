<?php
    include('config.php');
    $output = '';
    $search = $_POST['name'];

    $sql = "SELECT * FROM customers WHERE customerName LIKE '%$search%' OR customerAddress LIKE '%$search%' 
    OR  customerContact LIKE '%$search%' OR customerEmail LIKE '%$search%'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
	while ($customer=mysqli_fetch_assoc($result)) {
		echo"<tr>
                <td>".$customer['customerName']."</td> 
                <td>".$customer['customerContact']."</td> 
                <td>".$customer['customerAddress']."</td> 
                <td>".$customer['customerEmail']."</td> 
                <td>
                    <button class='btn btn-secondary' onclick='update(".$customer['customerID'].")' type='button'>Update</button>
                    <button class='btn btn-danger' onclick='updateStatus(".$customer['customerID'].")' type='button'>Deactivate</button>
                </td> 
		    </tr>";
            }
    }
    else{
        echo"<tr>
            <td></td> 
            <td></td> 
            <td>
            <div class='alert alert-light' role='alert'>
                No matching records found
            </div>
            </td>
            <td></td> 
            <td></td> 
        </tr>";
    }
?>