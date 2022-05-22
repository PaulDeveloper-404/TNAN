$(document).ready(function(){
    $("#logout").on('click',function(){
        $.ajax({
            type: 'POST',
            url: '/saintjames/php/logout.php',
            success: function(response){
                if(response == 1){
                    Swal.fire({
                        title: 'Logout Successfully',
                        text: "Thank you, Please Visit us again",
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
                    Swal.fire({
                    icon: 'error',
                    title: 'Logout Failed',
                })     
                }
            }
        })
    });
});