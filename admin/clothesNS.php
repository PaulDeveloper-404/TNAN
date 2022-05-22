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
            <div class="container bg-white pt-5 mt-2">
                <h4 class="mb-3 pt-5"><i class="bi bi-calendar3-fill"></i> CLOTHES NO STOCK</h4>
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item">
                        <a class="nav-link" style="color:#AD8B73;" href="http://localhost/TNAN/admin/clothesA.php">ACTIVE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="http://localhost/TNAN/admin/clothesNS.php">&nbsp;&nbsp;NO STOCK&nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:#AD8B73;" href="http://localhost/TNAN/admin/clothesNA.php">NOT ACTIVE</a>
                    </li>
                </ul>
                <div class="d-flex col-12">
                    <a type="button" class="btn text-white mx-1" style="background-color: #826F66 !important;" href="http://localhost/TNAN/admin/clothesNS.php"> <i class="fas fa-redo px-1"></i> REFRESH </a>
                </div>
            </div>
            
            <div class="container my-2 pt-1">
                <div class="row">
                    <div class="col-3 ms-auto">
                    <form class="d-flex">
                        <input class="form-control me-1" type="search" id="myInput" placeholder="Search" aria-label="Search">
                        <button disable class="btn text-white px-3" style="background-color: #826F66 !important;" type="button">Search</button>
                    </form>
                    </div>
                </div>
                <table id="foodTable" style="border:none;" class="table table-striped table-borderless text-center align-middle" style="border-top:1px solid black;">
                    <thead style="font-size:18px;">
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th width="35%">Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="foodData"></tbody>
                </table>
            </div>
        </div>
    <!-- MAIN CONTENT END -->

    <!-- UPDATE DISH MODAL -->
        <div class="modal fade" id="updateFoodModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-11">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-size:23px;"><i class="fas fa-edit"></i> Update <span style="color:#AD8B73;">Dish</span> </h5>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="container">
                <form id="updateDishForm">
                    <div class="col-12 text-center mb-2">
                    <img class="img-thumbnail" style="height:170px; width:280px; border-radius:10px;" src="" id="updateImage">
                </div>
                <div class="row g-4 mb-2">
                    <div class="col-6">
                        <label class="form-label">Name of Dish:</label>
                        <input type="hidden" name="updateID" id="updateID">
                        <input type="text" class="form-control" name="updateName" id="updateName">
                    </div>
                    <div class="col-6">
                        <label class="form-label">New Image:</label>
                        <input class="form-control" type="file" name="updateImage" >
                    </div>
                </div>

                <div class="row g-4 mb-2">
                    <div class="col-4">
                        <label class="form-label">Price (₱):</label>
                        <input type="text" class="form-control" name="updatePrice" id="updatePrice">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Category:</label>
                        <select class="form-select" aria-label="Default select example" name="updateCategory" id="updateCategory"></select>
                    </div>
                    <div class="col-4">
                        <label class="form-label">Stock:</label>
                        <input class="form-control" type="number" min="0" name="updateStock" id="updateStock">
                    </div>
                </div>   

                <div class="mb-1 mt-2">
                    <label class="form-label">Description:</label>
                    <textarea style="resize:none;" class="form-control" name="updateDescription" id="updateDescription" rows="3"></textarea>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4 ms-auto">
                        <button type="button" class="btn text-white" style="background-color: #826F66 !important;" name="updateBtn" id="updateBtn">Save Changes</button>
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
                    getFoodA();
                    foodCategories();
                    $('#foodTable').DataTable({
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
                    $('#updateFoodModal').modal('show')
                    $.ajax({
                        url: '/TNAN/admin/fetchData/updateDish.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {foodID: id},
                    })
                    .done(function(response) {
                        $('#updateID').val(response[0].foodID)
                        $('#updateImage').attr("src","/TNAN/admin/assets/foodPhoto/"+response[0].foodImage)
                        $('#updateName').val(response[0].foodName)
                        $('#updateCategory').val(response[0].foodCategory)
                        $('#updateStock').val(response[0].foodStock)
                        $('#updateDescription').val(response[0].foodDescription)
                        $('#updatePrice').val(response[0].foodPrice)
                        })
                }
            </script>
    <!-- END FUNCTION FOR FETCH DATA FOR THE UPDATE MODAL -->

    <!-- FUNCTION FOR FETCH DATA FOR THE UPDATE STATUS MODAL -->
            <script>    
               function updateStatus(id){
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to deactivate this Dish?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, deactivate it'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            url: '/TNAN/admin/php/dishDeactivate.php',
                            type: 'POST',
                            dataType: 'json',
                            data: {foodStatusID: id},
                        });
                        Swal.fire({
                        title: 'Deactivate Succesfully',
                        text: "Dish was deactivate successfully",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continue'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            getFoodA();
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
                        $("#foodData tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>
    <!-- END FUNCTION FOR FETCH DATA FOR SEARCH  -->

    <!-- FUNCTION FOR FETCHING FOOD CATEGORY -->
        <script>
                function foodCategories(){
                    $.ajax({
                    url: '/TNAN/admin/fetchData/foodCategory.php',
                    dataType:"json",
                    method:"GET",
                    success:function(response){
                        var data = "";
                        data+="<option selected>Choose</option>";
                        for(i=0;i<response.length;i++){
                            data+="<option value='"+response[i].categories_ID+"'>"+response[i].categories+"</option>"
                        }
                        $('#foodCategory').html(data)
                        $('#updateCategory').html(data)
                    },
                    error:function(error){
                        console.log(error)
                    }
                })
                }
                </script>
    <!-- END FUNCTION FOR FETCHING FOOD CATEGORY -->
  
    <!-- FUNCTION FOR FETCH FOOD DATA FOR TABLE -->
        <script>
            function getFoodA(){
                $.ajax({
                    url	:	"/TNAN/admin/fetchdata/getFood.php",
                    method:	"POST",
                    data	:	{getFoodNS:1},
                    success	:	function(data){
                        $("#foodData").html(data);
                    }
                })
            }
        </script>
    <!-- FUNCTION FOR FETCH FOOD DATA FOR TABLE-->

    <!-- FUNCTION FOR UPDATE PRODUCT -->
        <script>
            $('#updateBtn').click(function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Save Changes?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Continue'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var currentForm = $('#updateDishForm')[0];
                        var data = new FormData(currentForm);
                        $.ajax({
                            url:"/TNAN/admin/php/updateFood.php",
                            method:"POST",
                            dataType: "text",
                            data:data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success:function(response){
                                if(response == 1){
                                    Swal.fire({
                                        title: 'Update Successfully',
                                        text: "Food Has Updated",
                                        icon: 'info',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'Continue'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            update();
                                            getFoodA();
                                        }
                                    })
                                }else if(response == 'File is not an image.'){
                                    Swal.fire(
                                    'Update Failed',
                                    'File is not an image.',
                                    'error'
                                    )
                                }else if(response == 'Sorry, the file is too large.'){
                                    Swal.fire(
                                    'Update Failed',
                                    'Sorry the file is too large.',
                                    'error'
                                    )
                                }else if(response == 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'){
                                    Swal.fire(
                                    'Update Failed',
                                    'Sorry only JPG, JPEG, PNG & GIF files are allowed.',
                                    'error'
                                    )
                                }else if(response == 0){
                                    Swal.fire(
                                    'Update Failed',
                                    'Food Has Not Updated',
                                    'error'
                                    )
                                }
                            }
                        })
                    }
                })
            })
        </script>
    <!-- FUNCTION FOR UPDATE PRODUCT -->

</body>
</html>