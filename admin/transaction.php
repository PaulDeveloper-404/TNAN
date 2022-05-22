<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/TNAN/admin/css/datables.css" rel="stylesheet">
        <link href="/TNAN/admin/css/fontAwesome.css" rel="stylesheet">
        <link href="/TNAN/admin/css/admin.css" rel="stylesheet">
        <link href="/TNAN/admin/css/w3school.css" rel="stylesheet">
        <link rel="icon" type="image/gif/png" href="/TNAN/admin/assets/images/logo.png">
        <title>Zsaliah's Closet</title>
</head>
<body>

<?php session_start();?>

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
            <h3 class="w3-bar-item text-light text-center"><img class="card-img-top pt-5" style="border-radius:50%;" src="/TNAN/admin/assets/images/logo.png"></h3>
            <a href="/TNAN/admin/admin.php" class="w3-bar-item w3-button pt-3 sm-py-3 text-center">DASHBOARD</a>
            <a href="/TNAN/admin/clothesA.php" class="w3-bar-item w3-button pt-3 sm-py-3 text-center">PRODUCTS</a>
            <a href="/TNAN/admin/customerA.php" class="w3-bar-item w3-button pt-3 sm-py-3 text-center">CUSTOMER</a>  
            <a href="/TNAN/admin/transaction.php" class="w3-bar-item w3-button pt-3 sm-py-3 text-center">TRANSACTION</a>
            <p class="text-center pt-5 sm-mt-5" id="clockDisplay"></p>
            <p class="text-center" id="dateDisplay"></p>
        </div>

        <div style="margin-left:15%">
            <div class="container bg-white pt-5 mt-2 ">
                <h4 class="mb-3 pt-5"><i class="fab fa-paypal"></i> TRANSACTION DETAILS</h4>
                <ul class="nav nav-tabs mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="/TNAN/admin/transaction.php">&nbsp;&nbsp;ORDER&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  style="color:#AD8B73;" href="/TNAN/admin/preparing.php">PREPARING</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  style="color:#AD8B73;" href="/TNAN/admin/deliver.php">TO DELIVER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  style="color:#AD8B73;" href="/TNAN/admin/received.php">RECEIVED</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  style="color:#AD8B73;" href="/TNAN/admin/Completed.php">COMPLETED</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  style="color:#AD8B73;" href="/TNAN/admin/Cancel.php">CANCEL</a>
                        </li>
                </ul>
                <div class="row" id="fetchOrder"></div>
                <div class="row">
                    <div class="col-1 ms-auto">
                        <div class="my-4"id="pageno"></div>
                    </div>
                </div>
        <!-- END OF TABLE UI -->

    <!-- MAIN CONTENT END --> 

    <!-- JAVASCRIPT -->
        <script src="/TNAN/admin/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="/TNAN/admin/js/sweetalert.js"></script>
        <script src="/TNAN/admin/js/datables.js"></script>
        <script src="/TNAN/admin/js/logout.js"></script>
        <script src="/TNAN/admin/js/Date_Time.js"></script>
    <!-- END OF JAVASCRIPT -->

    <!-- DETABLES BEHAVIOR -->
        <script>
                $(document).ready( function () {
                    order();
                    page();
                    $('#customerTable').DataTable({
                        ordering:false,
                        searching:true,
                        paging:true,
                        bLengthChange: true,
                        info:true,
                        scrollY: "52vh",
                        scrollX: false,
                    });
                });
        </script>
    <!-- END DETABLES BEHAVIOR -->

    <!--FUNCTION FOR FETCHING ORDER -->
        <script>
            function order(){
                $.ajax({
                    url	:	"/TNAN/admin/fetchdata/getTransaction.php",
                    method:	"POST",
                    data	:	{getOrder:1},
                    success	:	function(data){
                        $("#fetchOrder").html(data);
                    }
                })
            }
        </script>
    <!--FUNCTION FOR FETCHING ORDER -->

    <!--FUNCTION FOR CREATING PAGINATION -->
        <script>
            function page(){
                $.ajax({
                    url	:	"/TNAN/admin/fetchdata/getTransaction.php",
                    method	:	"POST",
                    data	:	{page:1},
                    success	:	function(data){
                        $("#pageno").html(data);
                    }
                })
            }
        </script>
    <!--END FUNCTION FOR CREATING PAGINATION -->

    <!-- FUNCTION FOR PAGINATION -->
        <script>
            $("body").delegate("#page","click",function(){
                var pn = $(this).attr("page");
                $.ajax({
                    url	:	"/TNAN/admin/fetchdata/getTransaction.php",
                    method	:	"POST",
                    data	:	{getOrder:1,setPage:1,pageNumber:pn},
                    success	:	function(data){
                        $("#fetchOrder").html(data);
                    }
                })
            });
        </script>
    <!-- END FUNCTION FOR PAGINATION -->
    
    <!-- FUNCTION FOR MARKED A ORDER -->
        <script>
            function marked(id){
                Swal.fire({
                title: 'ARE YOU SURE?',
                text: "Do you want to PREPARE this order?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Continue'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: '/TNAN/admin/php/transact.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {prepare: id},
                });
                Swal.fire({
                    title: 'Prepare ',
                    text: "Order was preparing now!",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Continue'
                }).then((result) => {
                if (result.isConfirmed) {
                    order();
                }
                });
                }
                });
            }
        </script>
    <!-- END FUNCTION FOR MARKED A ORDER -->

</body>
</html>