<!DOCTYPE html>
<html lang="en" style="overflow:hidden;">
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
                <h4 class="mb-3 pt-5"><i class="fas fa-user"></i> CUSTOMER DETAILS</h4>
                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/TNAN/admin/customerA.php">&nbsp;&nbsp;ACTIVE&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:#AD8B73;" href="http://localhost/TNAN/admin/customerNA.php">NOT ACTIVE</a>
                        </li>
                    </ul>
            <div class="d-flex col-12">
                <a type="button" class="btn text-white" style="background-color: #826F66 !important;" href="http://localhost/TNAN/admin/customerA.php"> <i class="fas fa-redo px-1"></i> REFRESH </a>
            </div>
        </div>
            <div class="container my-3 pt-1">
                     <div class="col-3 ms-auto">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" id="myInput" placeholder="Search" aria-label="Search">
                        <button disable class="btn btn-outline-success px-3" type="button">Search</button>
                    </form>
                    </div>
                <table id="customerTable" class="table table-borderless table-striped text-center align-middle text-dark">
                    <thead style="font-size:18px;">
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="customerData"></tbody>
                </table>
            </div>
        </div>
    <!-- MAIN CONTENT END -->

    <!-- UPDATE CUSTOMER MODAL -->
        <div class="modal fade" id="updateCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-">
                <div class="modal-content">
                <div class="modal-body">
                    <input type="hidden" name="updateID" id="updateID">
                    <div class="row mb-3">
                        <div class="col-11">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-size:23px;"><i class="fas fa-user"></i> Customer <span style="color:#AD8B73;">Details</span></h5>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="container">
                    <div class="col-12 text-center mb-3">
                    <img class="img-thumbnail" style="height:170px; width:250px; border-radius:10px; " src="" id="updateImage">
                </div>
                <div class="row g-4 mb-3">
                    <div class="col-8">
                        <label class="form-label px-2">Fullname <small style="font-size:13px;">(FN-MI-LN):</small></label>
                        <input disable type="text" class="form-control" style="border-radius:20px;" name="updateName" id="updateName">
                    </div>
                    <div class="col-4">
                        <label class="form-label px-2">Status:</label>
                        <input readonly class="form-control text-center" type="text" value="Active" style="color:green; background:transparent; border-radius:20px;" readonly>
                    </div>
                </div>
                <div class="row g-4 mb-3">
                    <div class="col-6">
                        <label class="form-label px-2">Email:</label>
                        <input readonly type="text" class="form-control" style="border-radius:20px; background-color:transparent;" name="updateEmail" id="updateEmail">
                    </div>
                    <div class="col-6">
                        <label class="form-label px-2">Contact:</label>
                        <input readonly type="text" class="form-control" style="border-radius:20px; background-color:transparent;" name="updateContact" id="updateContact">
                    </div>
                </div>   
                <div class="row g-4 mb-3">
                    <div class="col-12">
                        <label class="form-label px-2">Address:</label>
                        <input readonly type="text" class="form-control" style="border-radius:20px; background-color:transparent;" name="updateAddress" id="updateAddress">
                    </div>
                </div>
                <div class="row g-4 mb-3">
                    <div class="col-6">
                        <label class="form-label px-2">Username:</label>
                        <input readonly type="text" class="form-control" style="border-radius:20px; background-color:transparent;" name="updateUsername" id="updateUsername">
                    </div>
                    <div class="col-6">
                        <label class="form-label px-2">Password:</label>
                        <input readonly type="text" class="form-control" style="border-radius:20px; background-color:transparent;" name="updatePassword" id="updatePassword">
                    </div>
                </div>   
        </form>
            </div>
            </div>
        </div>
     </div>
    <!-- END UPDATE DISH MODAL -->

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
                    getCustomer();
                    $('#customerTable').DataTable({
                        ordering:false,
                        searching:false,
                        paging:false,
                        bLengthChange: false,
                        info:false,
                        scrollY: "45vh",
                        scrollX: false,
                    });
                });
        </script>
    <!-- END DETABLES BEHAVIOR -->

    <!-- FUNCTION FOR FETCH DATA FOR THE UPDATE MODAL -->
         <script>    
                function update(id){
                    $('#updateCustomerModal').modal('show');
                    $.ajax({
                        url: '/TNAN/admin/fetchData/updateCustomer.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {customerID: id},
                    })
                    .done(function(response) {
                        $('#updateID').val(response[0].customerID)
                        $('#updateImage').attr("src","/TNAN/admin/assets/customersPhoto/"+response[0].customerImage)
                        $('#updateName').val(response[0].customerName)
                        $('#updateEmail').val(response[0].customerEmail)
                        $('#updateAddress').val(response[0].customerAddress)
                        $('#updateContact').val(response[0].customerContact)
                        $('#updateUsername').val(response[0].customerUsername)
                        $('#updatePassword').val(response[0].customerPassword)
                        })
                }
            </script>
    <!-- END FUNCTION FOR FETCH DATA FOR THE UPDATE MODAL -->

    <!-- FUNCTION FOR FETCH DATA FOR THE UPDATE STATUS MODAL -->
            <script>    
               function updateStatus(id){
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to deactivate this customer?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, deactivate it'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            url: '/TNAN/admin/php/cusDeactivate.php',
                            type: 'POST',
                            dataType: 'json',
                            data: {customerStatustID: id},
                        });
                        Swal.fire({
                        title: 'Deactivate Succesfully',
                        text: "customer was deactivate successfully",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continue'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "/TNAN/admin/customerNA.php";
                        }
                        })
                        }
                        })
                    }
            </script>
    <!-- END FUNCTION FOR FETCH DATA FOR THE UPDATE STATUS MODAL -->

    <!-- FUNCTION FOR FETCH DATA FOR SEARCH  -->
             <script>
                $(document).ready(function(){
                    $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#customerTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>
    <!-- END FUNCTION FOR FETCH DATA FOR SEARCH  -->

    <!-- FUNCTION FOR FETCH CUSTOMER DATA FOR TABLE -->
        <script>
            function getCustomer(){
                $.ajax({
                    url	:	"/TNAN/admin/fetchdata/getCustomer.php",
                    method:	"POST",
                    data	:	{getCustomerA:1},
                    success	:	function(data){
                        $("#customerData").html(data);
                    }
                })
            }
        </script>
    <!-- FUNCTION FOR FETCH CUSTOMER DATA FOR TABLE-->


</body>
</html>