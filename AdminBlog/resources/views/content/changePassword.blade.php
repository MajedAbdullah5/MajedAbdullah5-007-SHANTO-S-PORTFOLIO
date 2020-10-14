@extends('Layout.app')
@section('content')
    <div class="container" style=" max-width: 500px; margin-top: 200px;">
        <div class="row">
            <h6 class="font-weight-bold">Change Password</h6>
            <br>
            <input id="oldPassword" class="form-control p-2 m-2" type="text" placeholder="Old Password">
            <input id="newUsername" class="form-control p-2 m-2" type="text" placeholder="Username">
            <input id="newEmail" class="form-control p-2 m-2" type="email" placeholder="Email">
            <input id="newPassword" class="form-control p-2 m-2" type="text" placeholder="New Password">
            <input id="confirmPassword" class="form-control p-2 m-2" type="text" placeholder="Confirm New Password">
            <button id="changePassword" class="form-control p-2 m-2 btn-danger">Change</button>
        </div>
    </div>
@endsection
@section('script')
    <script>
            $('#changePassword').click(function (){
               let oldPassword =     $('#oldPassword').prop('value');
               let newUsername =     $('#newUsername').prop('value');
               let newEmail=         $('#newEmail').prop('value');
               let newPassword =     $('#newPassword').prop('value');
               let confirmPassword = $('#confirmPassword').prop('value');
               if(newPassword != confirmPassword){
                   alert("Password didn't match!");
               }
               else{
                   let formData = new FormData();
                   formData.append('oldPassword',oldPassword);
                   formData.append('newUsername',newUsername);
                   formData.append('newEmail',newEmail);
                   formData.append('newPassword',newPassword);
                   formData.append('confirmPassword',confirmPassword);
                   let config = {
                       headers:{
                           'content-type':',multipart/form-data'
                       }
                   }
                   axios.post('/changeAdminPassword',formData,config)
                   .then(function(response){
                        if(response.data == 1){
                            alert("Security has been changed!");
                        }
                        else{
                            alert("Old password is incorrect!");
                        }
                   }).catch(function(error){
                       alert("Server Error!");
                   });
               }
            });
    </script>
@endsection
