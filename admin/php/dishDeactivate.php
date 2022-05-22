    <?php
        session_start();
        include('config.php');
            $foodStatusID = $_POST['foodStatusID'];
            $dishStatus = $_POST['dishStatus'];
            $newStatus = 1;
            $sql = "UPDATE `food` SET `foodStatus` = '$newStatus' WHERE `foodID` = '$foodStatusID'";
            $update = mysqli_query($con, $sql);
                if($update){
                    echo 1;
                }else{
                    echo 0;
                }
    ?>



