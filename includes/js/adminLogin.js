
  $('#adminBtn').click(function(){
    var adminUsername = $('#adminUsername').val().trim();
    var adminPassword = $('#adminPassword').val().trim();
    if($('#adminUsername').val() =='' || $('#adminPassword').val() == ''){
      Swal.fire(
      'Sorry, login Failed',
      'Input all missing Fields',
      'warning'
      )        
      }else{
      $.ajax({
      url:"/TNAN/includes/php/adminLogin.php",
      method:"POST",
      dataType:"text",
      data:{
        adminLogin:1, 
        adminUsername:adminUsername,
        adminPassword:adminPassword
      },
      success: function(response) {
            if(response == 1){
            $('#adminLoginForm').trigger("reset");
            $('#adminLogin').modal('hide');
            Swal.fire({
            title: 'Login Successfully',
            text: 'Welcome To Admin',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continue'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = "/TNAN/admin/admin.php";
              }
            })
            }else if(response == 0){
            Swal.fire(
            'Sorry, login Failed',
            'Wrong Username/Password',
            'error'
            )
            }
            },
            error:function(er){
            console.log(er)
            }
            });
        }
    });