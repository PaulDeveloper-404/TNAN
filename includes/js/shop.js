// FUNCTION FOR GETTING DATE AND TIME
    function renderTime(){
        //DATE
        var myDate = new Date();
        var myYear = myDate.getFullYear();
            if(myYear < 1000){
                myYear += 1900;
            }
        var day = myDate.getDay();
        var month = myDate.getMonth();
        var dayM = myDate.getDate();
        var dayArray = new Array("Sunday", "Monday" , "Tuesday" , "Wednesday" , "Thursday" , "Friday" , "Saturday" );
        var monthArray = new Array ("January" ,"February" , "March" , "April" , "May" , "June" , "July" , "August" ,"September" , "October" , "November" , "December");

        var myDate = document.getElementById("dateDisplay");
        var year = document.getElementById("yearDisplay");
        myDate.textContent = ""+dayArray[day]+ "/" +monthArray[month]+ "/" +dayM+ "/" +myYear;
        myDate.innerText =  monthArray[month]+ "/" +dayM+ "/" +myYear;
        year.textContent = +myYear;
        year.innerText =  +myYear;
    }
    renderTime();
    window.onload = displayClock();
    function displayClock(){
    var time = new Date().toLocaleTimeString();
    document.getElementById("clockDisplay").innerHTML = time;
    setTimeout(displayClock, 1000); 
    }

// FOR CALLING A FUNCTION
    $(document).ready(function(){
        product();
        page();
        category();
        getCartItem();
        net_total();
        identification();
        count_item();
        count_pending();
        customerDetails();
    });

// FUNCTION FOR FETCH NAME AND IMAGES
    function identification(){
        $.ajax({
            url	:	"/TNAN/includes/php/function.php",
            method:	"POST",
            data	:	{identification:1},
            success	:	function(data){
                $("#navbarDropdown").html(data);
            }
        })
    }

// FUNCTION FOR FETCH CATEGORY
    function category(){
        $.ajax({
            url	:	"/TNAN/includes/php/function.php",
            method:	"POST",
            data	:	{category:1},
            success	:	function(data){
                $("#get_category").html(data);
            }
        })
    }

// FUNCTION FOR CLICK CATEGORY
    $("body").delegate(".category","click",function(event){
        $("#get_product").html("<div class='alert bg-light text-center' style='color:#AD8B73;' role='alert'><h5>Loading...</h5></div>");
        event.preventDefault();
        var cid = $(this).attr('cid');
            $.ajax({
            url		:	"/TNAN/includes/php/function.php",
            method	:	"POST",
            data	:	{get_seleted_Category:1,categories_ID:cid},
            success	:	function(data){
                $("#get_product").html(data);
                if($("body").width() < 480){
                    $("body").scrollTop(683);
                }
            }
        })
    });

// FUNCTION FOR SEARCH FOOD
    $("#search_btn").click(function(e){
        e.preventDefault();
        var keyword = $("#search").val();
        if(keyword != ""){
            $("#get_product").html("<div class='alert bg-light text-center' style='color:#AD8B73;' role='alert'><h5>Loading...</h5></div>");
            $.ajax({
            url		:	"/TNAN/includes/php/function.php",
            method	:	"POST",
            data	:	{search:1,keyword:keyword},
            success	:	function(data){ 
                $("#get_product").html(data);
                if($("body").width() < 480){
                    $("body").scrollTop(683);
                }
            }
        })
        }
    });

// FUNCTION FOR FETCHING FOOD
    function product(){
        $.ajax({
            url	:	"/TNAN/includes/php/function.php",
            method:	"POST",
            data	:	{getProduct:1},
            success	:	function(data){
                $("#get_product").html(data);
            }
        })
    }

// FUNCTION FOR CREATING PAGINATION
    function page(){
        $.ajax({
            url	:	"/TNAN/includes/php/function.php",
            method	:	"POST",
            data	:	{page:1},
            success	:	function(data){
                $("#pageno").html(data);
            }
        })
    }

// FUNCTION FOR PAGINATION
    $("body").delegate("#page","click",function(){
        var pn = $(this).attr("page");
        $.ajax({
            url	:	"/TNAN/includes/php/function.php",
            method	:	"POST",
            data	:	{getProduct:1,setPage:1,pageNumber:pn},
            success	:	function(data){
                $("#get_product").html(data);
            }
        })
    });

// FUNCTION FOR ADDING QTY IN CART BADGE
    function count_item(){
        $.ajax({
            url	:	"/TNAN/includes/php/function.php",
            method : "POST",
            data : {count_item:1},
            success : function(data){
                $("#cart_qty").html(data);
            }
        })
    } 

// FUNCTION FOR ADDING QTY IN PENDING BADGE
   function count_pending(){
    $.ajax({
        url	:	"/TNAN/includes/php/function.php",
        method : "POST",
        data : {count_pending:1},
        success : function(data){
            $("#pending_qty").html(data);
        }
    })
   }

// FUNCTION FOR GETTING CART ITEM FROM DB 
    function getCartItem(){
        $.ajax({
            url	:	"/TNAN/includes/php/function.php",
            method : "POST",
            data : {Common:1,getCartItem:1},
            success : function(data){
                $("#cart_product").html(data);
                net_total();
                customerDetails();
            }
        })
    }

// ADDING PRODUCT INTO CART
    $("body").delegate("#addCart","click",function(){
        var pid = $(this).attr("pid");
        $.ajax({
            url	:	"/TNAN/includes/php/function.php",
            method : "POST",
            data : {addToCart:1,proId:pid},
            success : function(response){
                customerDetails();
                count_item();
                getCartItem();
                if(response == "Product is already added, Please Continue Shopping"){
                    Swal.fire({
                        title: 'Product is already added',
                        icon: 'question',
                        confirmButtonColor: '#C85C5C',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            return false;
                        }
                    })
                }else if(response == "Your product has been added to cart, Please Continue Shopping"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'ADDED TO CART',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            }
        })
    });

// FUNTION FOR REMOVE ITEM FROM THE CART 
    $("body").delegate(".remove","click",function(e){
        e.preventDefault();
        var remove = $(this).parent().parent().parent();
        var remove_id = remove.find(".remove").attr("remove_id");
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to remove this product?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({    
                    url	:	"/TNAN/includes/php/function.php",
                    method	:	"POST",
                    data	:	{removeItemFromCart:1,rid:remove_id},
                    success	:	function(response){
                        if(response == 1){
                            Swal.fire({
                                title: 'Product Deleted',
                                icon: 'info',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Continue'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    getCartItem();
                                    count_item();
                                }
                            })
                        }
                    }
                })
            }
        })
    });

// FUNCTION FOR REMOVE ALL ITEM FROM THE CART 
    $("body").delegate(".removeAll","click",function(event){
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to remove all the products?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({     
                    url	:	"/TNAN/includes/php/function.php",
                    method	:	"POST",
                    data	:	{removeAll:1},
                    success	:	function(response){
                        if(response == 1){
                            Swal.fire({
                                title: 'All Product Deleted',
                                icon: 'info',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Continue'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    getCartItem();
                                    count_item();
                                }
                            })
                        }
                    }
                })
            }
        })
    });

// FUNCTION FOR UPDATE ITEM FROM THE CART 
    $("body").delegate(".update","click",function(e){
        e.preventDefault();
        var update = $(this).parent().parent().parent();
        var update_id = update.find(".update").attr("update_id");
        var qty = update.find(".quantity").val();
        Swal.fire({
            title: 'Save Changes?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Continue'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url	:	"/TNAN/includes/php/function.php",
                    method	:	"POST",
                    data	:	{updateCartItem:1,update_id:update_id,quantity:qty},
                    success	:	function(response){
                        if(response == 1){
                            Swal.fire({
                                title: 'Product Updated',
                                icon: 'info',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Continue'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    getCartItem();
                                }
                            })
                        }
                    }
                })
            }
        })
    });

// FUNCTION FOR TOTAL AMOUNT IN CART ITEM FUNCTION
    function net_total(){
        var result = 0;
        var price = document.getElementsByClassName('price');
        var quantity = document.getElementsByClassName('quantity');
        var total = document.getElementsByClassName('total');
        var totalH = document.getElementsByClassName('totalH');
        var total_amount = document.getElementById('total_amount');
        result = 0;
        for(i=0;i<price.length;i++){
            total[i].textContent=(price[i].value)*(quantity[i].value);
            result = result+(price[i].value)*(quantity[i].value);
            total_amount.textContent = result;       
        }

        for(i=0;i<price.length;i++){
            totalH[i].value=(price[i].value)*(quantity[i].value);
        }
    } 

// FUNCTION FOR FETCH DATA FOR UPDATE MODAL
    function updateProfile(id){
        $('#manageProfile').modal('show')
        $.ajax({
            url: '/TNAN/admin/fetchdata/updateCustomer.php/',
            type: 'POST',
            dataType: 'json',
            data: {customerID: id},
        })
        .done(function(response) {
            $('#updateID').val(response[0].customerID)
            $('#updateFname').val(response[0].customerName)
            $('#updateImage').attr("src","/TNAN/admin/assets/customersPhoto/"+response[0].customerImage)
            $('#updateAddress').val(response[0].customerAddress)
            $('#updateContact').val(response[0].customerContact)
            $('#updateUsername').val(response[0].customerUsername)
            $('#updateEmail').val(response[0].customerEmail)
            $('#updatePassword').val(response[0].customerPassword)
            updateProfile();
            })
    }
       
// FUNCTION FOR UPDATE PROFILE
    $('#updateBtn').click(function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to update your profile?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var currentForm = $('#updateForm')[0];
            var data = new FormData(currentForm);
            $.ajax({
                url: "/TNAN/includes/php/manageProfile.php",
                method: "POST",
                dataType: "text",
                data:data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    if(response == 'Sorry, the file is too large.'){
                        Swal.fire(
                        'Update Failed',
                        'Sorry the file is too large.',
                        'error'
                        )
                    }else if(response == 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'){
                        Swal.fire(
                        'Update Failed',
                        'Sorry, only JPG, JPEG, PNG & GIF files are allowed.',
                        'error'
                        )
                    }else if(response == 'Sorry the account are already exist'){
                        Swal.fire(
                        'Update Failed',
                        'Sorry the account are already exist',
                        'error'
                        )
                    }else if(response == 'Sorry the contact are already taken'){
                        Swal.fire(
                        'Update Failed',
                        'Sorry the contact are already taken',
                        'error'
                        )
                    }else if(response == 'Sorry the email are already taken'){
                        Swal.fire(
                        'Update Failed',
                        'Sorry the email are already taken',
                        'error'
                        )
                    }else if(response == 'Sorry the username are already taken'){
                        Swal.fire(
                        'Update Failed',
                        'Sorry the username are already taken',
                        'error'
                        )
                    }else if(response == 1){
                        Swal.fire({
                            title: 'Update Success',
                            text: "Your Profile Has Been Updated",
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                          }).then((result) => {
                            if (result.isConfirmed) {
                                customerDetails();
                                updateProfile();
                                identification();
                            }
                          })
                    }else if(response == 0){
                        Swal.fire(
                        'Update Failed',
                        'Sorry Your profile has not updated.',
                        'error'
                        )
                    }
                },
            error:function(error){console.log(error)}  }); 
            }
        })
    });

// FUNCTION FOR FETCH CUSTOMER DETAILS
    function customerDetails(){
        $.ajax({
            url: '/TNAN/includes/php/function.php',
            method: 'POST',
            dataType: 'json',
            data: {customerDetails: 1},
        })
        .done(function(response) {
            $('#user_id').val(response[0].customerID)
            })
    }

// CHECHOUT 
    $("body").delegate("#checkoutBtn","click",function(){
        $(".stock").val()
        $(".quantity").val()
        if($(".quantity").val() > $(".stock").val()){
            Swal.fire(
                'Invalid Quantity',
                'Sorry, The quantity cannot beyond the item stock.',
                'error'
            )
        }else{
            var currentForm = $('#checkoutForm')[0];
            var data = new FormData(currentForm);
            data.append('total_amount',$('#total_amount').text());
            Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to checkout?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, continue!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/TNAN/includes/php/order.php",
                    method: "POST",
                    dataType: "text",
                    data:data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(response == 0){
                            Swal.fire(
                            'Checkout Failed',
                            'Sorry the product was not checkout yet.',
                            'error'
                            )
                        }else if(response == 1){
                            Swal.fire({
                            title: 'Checkout Successfully',
                            text: "Wait for the response to deliver your food",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Continue'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                getCartItem();   
                                count_item();
                                product();
                                count_pending();
                            }
                            })                               
                        }else if(response == 2){
                            Swal.fire(
                            'Checkout Failed',
                            'Sorry, Please Complete your details account',
                            'error'
                            )
                        }
                        console.log(response);
                    },
                    error:function(error){
                    console.log(error)
                    }
                }) 
            }
            })
        }
    });

// FUNCTION FOR FETCH PURCHASE HISTORY
    function purchaseHistory(id){
        $('#purchaseHistoryModal').modal('show');
        $.ajax({
            url: '/TNAN/includes/php/function.php',
            method: 'POST',
            data: {purchaseHistory: id},
            success : function(data) {
                $("#purchaseHistoryData").html(data);
            }
        })
    }

// FUNCTION FOR FETCH PENDING PRODUCT
    function pending(){
        $('#pendingModal').modal('show');
            $.ajax({
                url: '/TNAN/includes/php/function.php',
                method: 'POST',
                data: {pendingID: 1},
                success : function(data) {
                    $("#fetchPending").html(data);
            }
        })
    }

// FUNCTION FOR RECEIVING ORDERS
    function received(id){
        Swal.fire({
        title: 'Do you receive the orders?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes i received'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: '/TNAN/includes/php/function.php',
            type: 'POST',
            dataType: 'json',
            data: {received: id},
        });
        Swal.fire({
            title: 'THANK YOU FOR TRANSACTING US',
            text: "MEET UP • PICK UP • DELIVERY",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Continue'
        }).then((result) => {
        if (result.isConfirmed) {
            pending();
            count_pending();
        }
        });
        }
        });
    }

// FUNCTION FOR RECEIVING ORDERS
    function cancel(id){
        Swal.fire({
        title: 'Cancel the orders?',
        text: "Do You want to cancel the orders",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Continue'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: '/TNAN/includes/php/function.php',
            type: 'POST',
            dataType: 'json',
            data: {cancel: id},
        });
        Swal.fire({
            title: 'THANK YOU FOR TRANSACTING US',
            text: "MEET UP • PICK UP • DELIVERY",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Continue'
        }).then((result) => {
        if (result.isConfirmed) {
            pending();
            count_pending();
        }
        });
        }
        });
    }