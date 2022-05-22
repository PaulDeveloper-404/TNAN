<?php
include('config.php');
// FETCH PRODUCT FROM DATABASE
if(isset($_POST["getFoodA"])){
    $sql = "SELECT f.foodID, f.foodName, f.foodCategory , f.foodDescription , f.foodPrice , c.categories_ID , c.categories FROM food f JOIN categories c ON c.categories_ID = f.foodCategory WHERE `foodStock` > 0 AND foodStatus = 0 ORDER BY `foodID` DESC";
    $result = mysqli_query($con,$sql) or die($con->error);
	if(mysqli_num_rows($result) > 0){
		while($food = mysqli_fetch_array($result)){	
			$foodID   = $food['foodID'];
			$foodName   = $food['foodName'];
			$categories = $food['categories'];
			$foodDescription = $food['foodDescription'];
			$foodPrice = $food['foodPrice'];
			echo "
            <tr >
                <td style='font-size:16px;'>$foodName</td> 
                <td style='font-size:16px;'>$categories</td> 
                <td style='font-size:16px;'>$foodDescription</td> 
                <td style='font-size:16px;'>₱$foodPrice.00</td> 
                <td style='font-size:16px;'>
                    <button class='btn btn-sm btn-secondary' type='button' onclick='update($foodID)'>UPDATE</button>
                    <button class='btn btn-sm btn-danger' type='button' onclick='updateStatus($foodID)'>DEACTIVE</button>
                </td> 
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
        <td style='font-size:16px;'></td>< 
        </tr>";
    }
}

// FETCH PRODUCT FROM DATABASE
if(isset($_POST["getFoodNA"])){
    $sql = "SELECT f.foodID, f.foodName, f.foodCategory , f.foodDescription , f.foodPrice , c.categories_ID , c.categories FROM food f JOIN categories c ON c.categories_ID = f.foodCategory WHERE foodStatus = 1 ORDER BY `foodID` DESC";
    $result = mysqli_query($con,$sql) or die($con->error);
	if(mysqli_num_rows($result) > 0){
		while($food = mysqli_fetch_array($result)){	
			$foodID   = $food['foodID'];
			$foodName   = $food['foodName'];
			$categories = $food['categories'];
			$foodDescription = $food['foodDescription'];
			$foodPrice = $food['foodPrice'];
			echo "
            <tr >
                <td style='font-size:16px;'>$foodName</td> 
                <td style='font-size:16px;'>$categories</td> 
                <td style='font-size:16px;'>$foodDescription</td> 
                <td style='font-size:16px;'>₱$foodPrice.00</td> 
                <td width='20%' style='font-size:16px;'>
                    <button class='btn btn-sm btn-success' type='button' onclick='updateStatus($foodID)'>ACTIVE</button>
                    <button class='btn btn-sm btn-secondary' type='button' onclick='update($foodID)'>UPDATE</button>
                    <button class='btn btn-sm btn-danger' type='button' onclick='deleteProduct($foodID)'>DELETE</button>
                </td> 
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
        <td style='font-size:16px;'></td>< 
        </tr>";
    }
}


// FETCH PRODUCT FROM DATABASE
if(isset($_POST["getFoodNS"])){
    $sql = "SELECT f.foodID, f.foodName, f.foodCategory , f.foodDescription , f.foodPrice , c.categories_ID , c.categories FROM food f JOIN categories c ON c.categories_ID = f.foodCategory WHERE `foodStock` = 0 AND foodStatus = 0 ORDER BY `foodID` DESC";
    $result = mysqli_query($con,$sql) or die($con->error);
	if(mysqli_num_rows($result) > 0){
		while($food = mysqli_fetch_array($result)){	
			$foodID   = $food['foodID'];
			$foodName   = $food['foodName'];
			$categories = $food['categories'];
			$foodDescription = $food['foodDescription'];
			$foodPrice = $food['foodPrice'];
			echo "
            <tr >
                <td style='font-size:16px;'>$foodName</td> 
                <td style='font-size:16px;'>$categories</td> 
                <td style='font-size:16px;'>$foodDescription</td> 
                <td style='font-size:16px;'>₱$foodPrice.00</td> 
                <td style='font-size:16px;'>
                    <button class='btn btn-sm btn-secondary' type='button' onclick='update($foodID)'>UPDATE</button>
                    <button class='btn btn-sm btn-danger' type='button' onclick='updateStatus($foodID)'>DEACTIVE</button>
                </td> 
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
        <td style='font-size:16px;'></td>< 
        </tr>";
    }
}


?>
