<?php
    include 'config.php';
    if(isset($_GET['id'])){
        $categories_ID = $_GET['categories_ID'];
        $sql = "SELECT * FROM `categories` WHERE `categories_ID` = '$categories_ID'";
    }else{
        $sql = "SELECT * FROM `categories`";
    }
        $result = mysqli_query($con,$sql);
            $categoryArray = array();
            if(mysqli_num_rows($result) > 0){
                while($rows = mysqli_fetch_assoc($result)){
                    array_push($categoryArray, $rows);
                }
            }
    echo json_encode($categoryArray);
?>