$(document).ready(function(){
    updateProfile();
});


// FUNCTION FOR FETCH DATA FOR UPDATE MODAL
function updateProfile(){
    $.ajax({
        url: '/TNAN/admin/fetchdata/updateCustomer.php/',
        type: 'POST',
        dataType: 'json',
        data: {customerID: 1},
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
