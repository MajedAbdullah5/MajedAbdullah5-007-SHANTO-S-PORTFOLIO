@extends('Layout.app2')
@section('content')
    <div class="jumbotron mt-5" >
        <div class="row " style="max-width: 940px; margin: auto;  border:1px solid #f63854">
            <div class="col-md-6">
                <img width="100%" height="100%" src="{{asset('/image/loader/reset.jpg')}}" alt="">
            </div>
            <div class="col-md-6 form-group my-lg-5">
                <h6 class="mb-5 mt-2 font-weight-bold">RESET PASSWORD</h6>
                <input id="adminName" class="form-control mb-3" type="text" placeholder="Enter your Name" required>
                <input id="adminEmail" class="form-control mb-3" type="text" placeholder="Enter your Email" required>
                <input id="adminUsername" class="form-control mb-3" type="text" placeholder="Enter your Username" required>
                <input id="adminPass"  class="form-control mb-3" type="text" placeholder="New Password" required>
                <input id="adminConfirmPass"  class="form-control mb-3" type="text" placeholder="Confirm Password" required>
                <small><a href="{{url('/adminLoginPage')}}">Return to login page</a></small>
                <button id ="submit" class="form-control text-center btn-danger mt-3">SIGNUP</button>
            </div>

        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        $('#submit').click(function (){
            let adminName =  $('#adminName').prop('value');
            let adminEmail =  $('#adminEmail').prop('value');
            let adminUsername =  $('#adminUsername').prop('value');
            let adminPass =  $('#adminPass').prop('value');
            let adminConfirmPass =  $('#adminConfirmPass').prop('value');
            if(adminPass != adminConfirmPass){
                alert("Password can't match!");
            }
            else{
                let formData = new FormData();
                formData.append('adminName',adminName);
                formData.append('adminUsername',adminUsername);
                formData.append('adminEmail',adminEmail);
                formData.append('adminPass',adminPass);
                formData.append('adminConfirmPass',adminConfirmPass);
                let config = {
                    headers:{
                        'content-type':',multipart/form-data'
                    }
                }
                axios.post('/registerAdmin',formData,config).
                then(function(response){
                    console.log(response.data);
                    if(response.data == 1){
                        alert("Admin added!");
                        window.location.href='/adminLoginPage';
                    }
                    else{
                        alert("Can't register!");
                    }
                }).catch(function(error){
                    alert("Can't register!");
                });
            }
        });
    </script>
@endsection
