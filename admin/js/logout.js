$(document).ready(function(){
    $("#logout").on('click',function(){
        $.ajax({
            type: 'POST',
            url:"/TNAN/includes/php/logout.php",
            success: function(response){
                if(response == 1){
                    // LOGOUT SUCCESSFULLY
                    Swal.fire({
                    title: 'Logout Successfully',
                    text: "Thank You, Please Visit Us Again",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Continue'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/TNAN/main.html";
                    }
                    })
                }
                else{
                    // LOGOUT FAILED
                    Swal.fire({
                    icon: 'error',
                    title: 'Logout Failed',
                })     
                }
            }
        })
    });
});