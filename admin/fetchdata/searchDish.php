<?php
    include('config.php');
    $output = '';
    $search = $_POST['name'];

    $sql = "SELECT * FROM food WHERE foodName LIKE '%$search%' OR foodCategory LIKE '%$search%' 
    OR  foodDescription LIKE '%$search%' OR foodPrice LIKE '%$search%'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
	while ($food=mysqli_fetch_assoc($result)) {
		echo"<tr>
                <td>".$food['foodName']."</td> 
                <td>".$food['foodCategory']."</td> 
                <td>".$food['foodDescription']."</td> 
                <td>₱".$food['foodPrice']."</td> 
                <td>
                    <button class='btn btn-secondary' onclick='update(".$food['foodID'].")' type='button'>Update</button>
                    <button class='btn btn-danger' onclick='updateStatus(".$food['foodID'].")' type='button'>Deactivate</button>
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