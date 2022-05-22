      // FUNCTION FOR PASSWORD ENABLE
      function seePassword() {
        var x = document.getElementById("customerPassword");
        var a = document.getElementById("customerConPassword");

        if (x.type === 'password' && a.type === 'password'){
            x.type ="text";
            a.type ="text";
        }else{
            x.type="password";
            a.type="password";
        }
        
    }

     
    $('#signUpBtn').click(function(){
      let customerName = $('#customerName').val();
      let customerUsername = $('#customerUsername').val();
      let customerPassword = $('#customerPassword').val();
      let customerConPassword = $('#customerConPassword').val();
        var currentForm = $('#registrationForm')[0];
        var data = new FormData(currentForm);
      if($('#customerName').val() =='' || $('#customerUsername').val() =='' || $('#customerPassword').val() == '' || $('#customerConPassword').val() == ''){
        Swal.fire(
        'Sorry Registration Failed',
        'Input all missing Fields',
        'warning'
        )        
      }else if((customerUsername).length < 5 || (customerUsername).length > 30){
      Swal.fire(
        'Sorry Registration Failed',
        'length of username must be between 5 and 30',
        'error'
        )   
      }else if((customerName).length < 5 || (customerName).length > 30){
      Swal.fire(
        'Sorry Registration Failed',
        'length of fullname must be between 5 and 30',
        'error'
        )   
      }else if((customerPassword).length < 5 || (customerPassword).length > 30){
      Swal.fire(
        'Sorry Registration Failed',
        'length of password must be between 5 and 30',
        'error'
        )   
      }else if((customerPassword) !== (customerConPassword)){
       Swal.fire(
        'Sorry Registration Failed',
        'Password Mismatch',
        'error'
        )   
      }else{
        $.ajax({
        url:"/TNAN/includes/php/signup.php",
        method:"POST",
        dataType:"text",
        data:data,
        cache:false,
        contentType:false,
        processData:false,
        success: function(response) {
            if(response == 'Sorry The account are already exist'){
              Swal.fire(
              'Sorry Register Failed',
              'The account are already exist',
              'error'
              )
            }else if(response == 'Sorry the username are already exist'){
              Swal.fire(
              'Sorry Register Failed',
              'Sorry the username are already taken',
              'error'
              )
            }else if(response == 'Sorry Invalid Name'){
            Swal.fire(
            'Sorry Invalid Name',
            'Please Choose valid name',
            'error'
            )
            }else if(response == 'Sorry Invalid Username'){
            Swal.fire(
            'Sorry Invalid Username',
            'Please Choose valid Username',
            'error'
            )
            }else if(response == 0){
                Swal.fire(
                'Sorry Register Failed',
                'Registered Failed',
                'error'
                )
            }else if(response == 1){
              $('#registrationForm').trigger("reset");
              Swal.fire({
              title: 'Register Successfully',
              text: 'Please Login to access our application',
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
              },
              error:function(er){
              console.log(er)
              }
              })
          }
      });