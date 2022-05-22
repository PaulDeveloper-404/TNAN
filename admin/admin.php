<!DOCTYPE html>
<html lang="en">
<head>
    <!-- STYLE -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/TNAN/admin/css/datables.css" rel="stylesheet">
        <link href="/TNAN/admin/css/fontAwesome.css" rel="stylesheet">
        <link href="/TNAN/admin/css/admin.css" rel="stylesheet">
        <link href="/TNAN/admin/css/w3school.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="icon" type="image/gif/png" href="/TNAN/admin/assets/images/logo.png">
        <title>Zsaliah's Closet</title>
    <!-- END OF STYLE -->
</head>
<body>

    
    <!--PHP FUNCTION  -->
         <?php session_start();
            include 'config.php';
            $sql1 = "SELECT `foodID` FROM `food` WHERE `foodStatus` = 0";
            $result1 = mysqli_query($con, $sql1);
            $product = mysqli_num_rows($result1);

            $sql2 = "SELECT `customerID` FROM `customers` ORDER BY `customerID`";
            $result2 = mysqli_query($con, $sql2);
            $customer = mysqli_num_rows($result2);

            $sql3 = "SELECT SUM(total_amount) AS total FROM order_manager";
            $result3 = mysqli_query($con, $sql3);
            while($row = mysqli_fetch_assoc($result3)){
                $total_amount = $row['total'];
            }

            $sql4 = "SELECT `order_status` FROM `order_manager` WHERE `order_status` = 'Complete' ORDER BY `order_id`";
            $result4 = mysqli_query($con, $sql4);
            $transaction = mysqli_num_rows($result4);

        ?>
    <!--PHP FUNCTION  -->

    <!-- NAVBAR -->
        <nav style="background-color: #d5bbac !important; " class="navbar navbar-expand-lg navbar-dark  py-2 fixed-top px-5">
        <a class="navbar-brand me-auto ms-2" href="#" style="color:#201812">Zsaliah's Closet <i class="fas fa-columns px-1"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ms-auto pt-2 text-white">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item px-2 dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-4"></i>                           
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
                            <style>
                            .dropdown-menu li a:hover,.dropdown-item:hover{
                                background-color:white;
                                color: black !important;
                            }
                        </style>
                            <li><a class="dropdown-item text-white" href="#"><i class="fas fa-cog px-1"></i> <span>SETTINGS</span></a></li>
                            <li><button class="dropdown-item text-white" id="logout"><i class="fas fa-door-open px-1"></i><span> LOGOUT</span></button></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- END NAVBAR -->

    <!-- MAIN CONTENT -->
        <div class="w3-sidebar w3-bar-block text-dark" style="width:15%; background-color: #d5bbac !important;">
            <h3 class="w3-bar-item text-light text-center"><img class="card-img-top pt-2" style="border-radius:50%;" src="/TNAN/admin/assets/images/logo.png"></h3>
            <a href="/TNAN/admin/admin.php" class="w3-bar-item w3-button pt-3 sm-py-3 text-center">DASHBOARD</a>
            <a href="/TNAN/admin/clothesA.php" class="w3-bar-item w3-button pt-3 sm-py-3 text-center">PRODUCTS</a>
            <a href="/TNAN/admin/customerA.php" class="w3-bar-item w3-button pt-3 sm-py-3 text-center">CUSTOMER</a>  
            <a href="/TNAN/admin/transaction.php" class="w3-bar-item w3-button pt-3 sm-py-3 text-center">TRANSACTION</a>
            <p class="text-center pt-5 sm-mt-5" id="clockDisplay"></p>
            <p class="text-center" id="dateDisplay"></p>
        </div>

        <div style="margin-left:15%">
            <div class="container bg-white pt-5 mt-5 ">
            <div class="row">
                    <div class="col-3">
                        <div class="card text-white bg-dark mb-3 round shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                <i style="font-size:5rem" class="fab fa-shopify pt-3 text-light"></i>
                                </div>   
                                <div class="col-8">
                                    <h5 class="card-title text-light">TOTAL AMOUNT SALES</h5>
                                    <p class="card-text fs-2 px-3 text-light">₱<?php echo $total_amount ?></p>
                                </div>   
                            </div>   
                        </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="text-white bg-dark mb-3 round shadow">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-4">
                                            <i style="font-size:5rem" class="fas fa-users pt-3 text-light"></i>                              
                                        </div>   
                                        <div class="col-8">
                                            <h5 class="card-title px-4 text-light">TOTAL CUSTOMERS</h5>
                                            <p class="card-text fs-2 px-5 text-light"><?php echo $customer ?></p>
                                        </div>   
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="text-white bg-dark mb-3 round shadow">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-5">
                                        <i style="font-size:6rem" class="fas fa-chart-bar pt-2 text-light"></i>                                
                                        </div>   
                                        <div class="col-7">
                                            <h5 class="card-title text-light">TOTAL TRANSACTION</h5>
                                            <p class="card-text fs-2 px-5 text-light"><?php echo $transaction ?></p>
                                        </div>   
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="text-white bg-dark mb-3 round shadow">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-5">
                                        <i style="font-size:6rem" class="fas fa-question pt-2 text-light"></i>                               
                                        </div>   
                                        <div class="col-7">
                                            <h5 class="card-title text-light">TOTAL PRODUCTS</h5>
                                            <p class="card-text fs-2 px-4 text-light"><?php echo $product ?></p>
                                        </div>   
                                </div>   
                            </div>
                        </div>
                    </div>
            </div>

                <div class="row mx-1">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title fw-bold pb-2"><i class="fas fa-project-diagram"></i> RECENT TRANSACTION DETAILS</h5>
                            <table  class="table table-bordered text-center aligb-middle">
                                <thead>
                                    <tr>
                                        <th>TRANSACTION ID</th>
                                        <th>USER</th>
                                        <th>TOTAL AMOUNT PAY</th>
                                        <th>DATE TIME BOUGHT</th>
                                        <th>PAYMENT OPTION</th>
                                    </tr>                                    
                                </thead>
                                <tbody id="transaction"></tbody >
                            </table>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    <!-- END MAIN CONTENT -->

    <!-- JAVASCRIPT -->
        <script src="/TNAN/admin/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="/TNAN/admin/js/sweetalert.js"></script>
        <script src="/TNAN/admin/js/datables.js"></script>
        <script src="/TNAN/admin/js/logout.js"></script>
        <script src="/TNAN/admin/js/Date_Time.js"></script>

    <!-- END OF JAVASCRIPT -->

    <!-- FUNCTION FOR FETCH CUSTOMER DATA FOR TABLE -->
        <script>
               $(document).ready( function () {
                getDetails() ;  
                getTotalSales(); 
                });

                function getDetails(){
                    $.ajax({
                        url	:	"/TNAN/admin/fetchdata/getDetails.php",
                        method:	"POST",
                        data	:	{getDetails:1},
                        success	:	function(data){
                            $("#transaction").html(data);
                        }
                    })
                }

                function getTotalSales(){
                    $.ajax({
                        url	:	"/TNAN/admin/fetchdata/fetchTotal.php",
                        method:	"POST",
                        data	:	{getSales:1},
                        success	:	function(data){
                            $("#fetchSales").text(data);
                        }
                    })
                }

                function getTotalCustomer(){
                    $.ajax({
                        url	:	"/TNAN/admin/fetchdata/fetchTotal.php",
                        method:	"POST",
                        data	:	{getCustomers:1},
                        success	:	function(data){
                            $("#fetchCustomers").html(data);
                        }
                    })
                }

                function getTotalTransaction(){
                    $.ajax({
                        url	:	"/TNAN/admin/fetchdata/fetchTotal.php",
                        method:	"POST",
                        data	:	{getComplaints:1},
                        success	:	function(data){
                            $("#fetchComplaints").html(data);
                        }
                    })
                }

                function getTotalComplaint(){
                    $.ajax({
                        url	:	"/TNAN/admin/fetchdata/fetchTotal.php",
                        method:	"POST",
                        data	:	{getTransactions:1},
                        success	:	function(data){
                            $("#fetchTransaction").html(data);
                        }
                    })
                }
        </script>
    <!-- FUNCTION FOR FETCH CUSTOMER DATA FOR TABLE-->
  
</body>
</html>