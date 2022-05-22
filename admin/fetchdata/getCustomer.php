<?php
include('config.php');
// ACTIVE
if(isset($_POST["getCustomerA"])){
    $sql = "SELECT *  FROM `customers` WHERE `customerStatus` = 0 ORDER BY `customerID` DESC";
    $result = mysqli_query($con,$sql) or die($con->error);
	if(mysqli_num_rows($result) > 0){
		while($customers = mysqli_fetch_array($result)){	
			$customerID   = $customers['customerID'];
			$customerName   =$customers['customerName'] ;
			$customerContact = $customers['customerContact'];
			$customerAddress = $customers['customerAddress'] ;
			$customerEmail = $customers['customerEmail'] ;
			echo "
            <tr>
                <td>$customerName</td> 
                <td> $customerContact</td> 
                <td> $customerAddress</td> 
                <td>$customerEmail</td> 
                    <td>
                        <button class='btn btn-sm btn-secondary' type='button' onclick='update($customerID)'>DETAILS</button>
                        <button class='btn btn-sm btn-danger' type='button' onclick='updateStatus($customerID)'>DEACTIVATE</button> 
                    <td>
            </tr>
			";
		}
	}else{
        echo "
        <tr >
            <td style='font-size:16px;'></td> 
            <td style='font-size:16px;'></td> 
            <td style='font-size:16px;'>NO DATA FOUND</td> 
            <td style='font-size:16px;'></td> 
            <td style='font-size:16px;'></td>
        </tr>";
    }
}
if(isset($_POST["getCustomerNA"])){
    $sql = "SELECT *  FROM `customers` WHERE `customerStatus` = 1 ORDER BY `customerID` DESC";
    $result = mysqli_query($con,$sql) or die($con->error);
	if(mysqli_num_rows($result) > 0){
		while($customers = mysqli_fetch_array($result)){	
			$customerID   = $customers['customerID'];
			$customerName   =$customers['customerName'] ;
			$customerContact = $customers['customerContact'];
			$customerAddress = $customers['customerAddress'] ;
			$customerEmail = $customers['customerEmail'] ;
			echo "
            <tr>
                <td>$customerName</td> 
                <td>$customerContact</td> 
                <td>$customerAddress</td> 
                <td>$customerEmail </td> 
                <td width=20%>
                    <button class='btn btn-sm btn-success' type='button' onclick='updateStatus($customerID)'>ACTIVE</button>
                    <button class='btn btn-sm btn-secondary' type='button' onclick='update($customerID)'>UPDATE</button>
                    <button class='btn btn-sm btn-danger' type='button' onclick='deleteCustomer($customerID)'>DELETE</button>
                <td>
            </tr>
			";
		}
	}else{
        echo "
        <tr >
            <td style='font-size:16px;'></td> 
            <td style='font-size:16px;'></td> 
            <td style='font-size:16px;'>NO DATA FOUND</td> 
            <td style='font-size:16px;'></td> 
            <td style='font-size:16px;'></td>
        </tr>";
    }
}
?>