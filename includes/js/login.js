  //FUNCTION FOR LOGIN
  $('#loginBtn').click(function(){
    var username = $('#custUsername').val().trim();
    var password = $('#custPassword').val().trim();
    if($('#custUsername').val() =='' || $('#custPassword').val() == ''){
      Swal.fire(
      'Enter your credentials',
      'Please input all missing Fields',
      'warning'
      )        
      }else{
      $.ajax({
      url:"/TNAN/includes/php/login.php",
      method:"POST",
      dataType:"text",
      data:{
        login:1, 
        username:username,
        password:password
      },
      success: function(response) {
            if(response == 1){
            $('#loginForm').trigger("reset");
            $('#login').modal('hide');
            Swal.fire({
            title: 'Login Successfully',
            text: 'Welcome To Tindahan Ni Aling Nena',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continue'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = "/TNAN/shop.php";
              }
            })
            }else if(response == 2){
            Swal.fire({
            icon: 'error',
            title: 'Sorry Login Failed',
            text: 'Your account has been disable to access',
            footer: '<a href="/TNAN/issue.html">PLEASE CONTACT ADMIN</a>'
            })
            }else if(response == 0){
            Swal.fire(
            'Sorry Login Failed',
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

    // FUNCTION FOR PASSWORD ENABLE
    function seePassword() {
      var x = document.getElementById("custPassword");
      if (x.type==='password'){
          x.type ="text";
          y.style.display="block";
          z.style.display="none";
      }else{
          x.type="password";
          y.style.display="none"
          z.style.display="block";
      }
      }