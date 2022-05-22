<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FASHION TEEN TRENDS</title>
    <link rel="stylesheet" href="/TNAN/includes/css/shopsss.css">
    <link rel="stylesheet" href="/TNAN/includes/css/fontAwesome.css">
    <link rel="icon" type="image/gif/png" href="/TNAN/admin/assets/images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="body"> 

        <!-- PHP ACTION -->
            <?php
            require_once "./includes/php/connection.php";
            session_start();
            if(!isset($_SESSION["uid"])){
                header("location:/TNAN/main.html");
            }
            ?>
        <!-- END PHP ACTION -->

        <!-- NAVBAR -->
            <nav class="navbar navbar-expand-lg px-2 sticky-top navbar-dark">
                <div class="container-fluid">
                    <ul></ul>
                    <a class="navbar-brand text-white fw-bold" style="font-size:15px" href="#">Zsaliah's Closet <i class="fas fa-columns px-1"></i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">       
                        <form id="searchForm" class="d-flex px-5">
                            <input id="search" class="form-control round-pill" style="width:15rem;" type="search" placeholder="Search Product Here.">
                            <button id="search_btn" class="btn text-white" style="background-color: #826F66 !important" type="submit">Search</button>    
                        </form>                 
                        <!-- <li class="nav-item px-1 pt-1">
                            <a type="button" class="btn text-white btn-sm" style="background-color: #AD8B73 !important;" href="http://localhost/TNAN/shop.php"> <i class="fas fa-redo px-1"></i> Refresh</a>
                        </li> -->
                        <li class="nav-item px-1">
                        <button type="button" class="nav-link btn text-white" style="font-size:14px;" data-bs-toggle="modal" data-bs-target="#showCart"><i class="fas fa-shopping-cart" style="font-size:15px;"></i> Cart <span class="badge" id="cart_qty"> 0</span></button>
                        </li>
                        <li class="nav-item px-1">
                        <button type="button" class="nav-link btn text-white" onclick="pending(<?php echo $_SESSION['uid'];?>)" style="font-size:14px;"><i class="fas fa-truck" style="font-size:15px;"></i> Pending <span class="badge" id="pending_qty"> 0</span></button>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end bg-light">
                        <li><a class="dropdown-item text-dark" href="#"><i class="fas fa-cog px-1"></i> Settings</a></li>
                            <li><button type="button" onclick="updateProfile(<?php echo $_SESSION['uid'];?>)" class="dropdown-item text-dark" href="#"><i class="fas fa-user px-1"></i> Manage Profile</button></li>
                            <li><button type="button" onclick="purchaseHistory(<?php echo $_SESSION['uid'];?>)" class="dropdown-item text-dark" href="#"><i class="fas fa-history px-1"></i> Purchase History</button></li>
                            <li><hr class="dropdown-divider text-dark"></li>
                            <li><button class="dropdown-item text-dark" id="logout"><i class="fas fa-door-open px-1"></i> Logout</button></li>
                        </ul>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
        <!-- END NAVBAR -->

        <!-- MAIN -->           
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-md-2">
                        <div class="sidenav">
                            <div class="sideHeader">
                                <div class="col-4 px-4"><h4><span style="color:#AD8B73;">Fashion</span> <br>Categories</h4></div>
                            </div>
                            <div class="sideBody pt-2" id="get_category"><!-- FETCH CATEGORY --></div>
                            <div class="sideFooter px-4 pt-2">
                                <div class="px-2" style="font-size:15px; margin-left:9px;"  id="clockDisplay"><!-- FETCH CLOCK --></div>
                                <div class="pt-2 text-uppercase" style="margin-left:10px; font-size:14px;" id="dateDisplay"><!-- FETCH DATE --></div>
                            </div>
                        </div>
                    </div>
                <div class="col-md-10">	
                    <div class="card col-12" style="border-radius:8px;" id="scroll">
                        <div class="card-heading px-4 pt-4">
                            <div class="row">
                                <div class="col-8">
                                    <h4>MEET UP • PICK UP • DELIVERY</h4>
                                </div>                                
                            </div>
                        </div>
                            <div class="card-body">
                                <div class="row" id="get_product"><!-- FETCHING PRODUCT FROM DATABASE --></div>
                            </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-10 text-dark" style="font-weight:500;">
                                    &copy;FASHION TEEN TRENDS CLOTHING STORE || <bold style="color:#AD8B73"  id="yearDisplay"></bold>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                                <ul class="pagination float-end mt-1 px-4" id="pageno"></ul></div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END MAIN -->

        <!-- SHOW CART MODAL -->
           <div class="modal fade" id="showCart">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="container-fluid" >
                                <div class="row g-4">
                                    <div class="col-11">
                                        <h5 class="modal-title"><i class="fas fa-shopping-cart px-1"></i>Cart <span style="color:#AD8B73;">Details</span></h5>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                </div>
                                <div class="row mt-3" id="cart_product"> <!-- TABLE CART WILL POP HERE --></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END OF SHOW CART MODAL -->

        <!-- MANAGE PROFILE  -->
            <div class="modal fade" id="manageProfile">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-11">
                                    <h5 class="modal-title"> <i class="far fa-id-card"></i> MANAGE <span style="color:#AD8B73;">PROFILE</span></h5>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="container">
                            <form id="updateForm">
                                    <input type="hidden" name="updateID" id="updateID">
                                    <div class="row mb-2">
                                        <div class="col-7" style="align-items:center;">
                                            <div class="pt-4 mt-5">
                                                <label class="form-label px-2 px-2">Update Image:</label>
                                                <input placeholder='Insert your image here' class="form-control text-dark" style="border-radius:10px;" type="file" name="updateImage">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                             <img alt='image of the users' class="img-thumbnail" style="height:140px; width:180px; " src="" id="updateImage">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-7">
                                            <label class="form-label  px-2">Fullname: <small class="text-secondary">(Ln, Fn Mi)</small></label>
                                            <input placeholder='Insert your name here' type="text" class="form-control text-dark" style="border-radius:20px;" name="updateFname" id="updateFname">
                                        </div>
                                        <div class="col-5">
                                            <label class="form-label  px-2">Contact:</label>
                                            <input placeholder='Insert your number here' type="text" class="form-control text-dark" style="border-radius:20px;" name="updateContact" id="updateContact">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-12">
                                            <label class="form-label px-2">Address:</label>
                                            <input placeholder='Insert your address here' type="text" class="form-control text-dark" style="border-radius:20px;" name="updateAddress" id="updateAddress">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-2">
                                        <!-- <div class="col-6">
                                            <label class="form-label px-2">Username:</label>
                                            <input placeholder='Insert your username here' type="text" class="form-control text-dark" style="border-radius:20px;" name="updateUsername" id="updateUsername">
                                        </div> -->
                                        <div class="col-12">
                                            <label class="form-label  px-2">Email:</label>
                                            <input placeholder='Insert your email here' type="text" class="form-control text-dark" style="border-radius:20px;" name="updateEmail" id="updateEmail">
                                        </div>
                                    </div>
                                    <!-- <div class="row ">
                                        <div class="col-12">
                                            <label class="form-label  px-2">Password:</label>
                                            <input  type="text" class="form-control text-dark text-center" style="border-radius:20px;" name="updatePassword">
                                        </div>
                                    </div> -->
                            </div> 
                            </div>
                            <div class="row mb-4">
                                <div class="col-5 ms-auto">
                                    <a class="btn text-white"  style="background-color: #826F66 !important;" href="#" role="button">Link</a>                                
                            </div>
                                <div class="col-5 ms-auto">
                                    <button type="button" id="updateBtn" name="updateBtn" class="btn text-white"  style="background-color: #826F66 !important;">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        <!-- END MANAGE PROFILE  -->

        <!-- PURCHASE HISTORY -->
            <div class="modal fade" id="purchaseHistoryModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-11">
                                    <h5 class="modal-title"><i class="fas fa-history px-1"></i> Purchased <span style="color:#AD8B73;">History</span></h5>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                            <div id="purchaseHistoryData"></div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- EMD PURCHASE HISTORY -->

        <!-- PENDING PRODUCT -->
            <div class="modal fade" id="pendingModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row g-4">
                                <div class="col-11">
                                    <h5 class="modal-title"><i class="fas fa-truck"></i> Pending <span style="color:#AD8B73;">Order</span></h5>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="row mt-4" id="fetchPending">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END OF PENDING PRODUCT -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="/TNAN/includes/js/jquery-3.6.0.min.js"></script>
<script src="/TNAN/includes/js/sweetalert.js"></script>
<script src="/TNAN/admin/js/logout.js"></script>
<script src="/TNAN/includes/js/shop.js"></script>
</html>
