   @extends('Layout.app2')
   @section('content')
       <div class="jumbotron mt-5" >
           <div class="row " style="max-width: 940px; margin: auto;  border:1px solid #f63854">
               <div class="col-md-6">
                   <img width="100%" src="{{asset('/image/loader/admin.jpg')}}" alt="">
               </div>
               <div class="col-md-6 form-group my-lg-5">
                   <form action=" " class='loginForm'>
                   <h6 class="mb-5 mt-2 font-weight-bold">ADMIN LOGIN</h6>
                   <input id="adminName" name="userName" value="" class="form-control mb-3" type="text" placeholder="Username" required>
                   <input id="adminPass" name="userPass" value="" class="form-control mb-5" type="password" placeholder="Password" required>
                   <small><a   href="{{url('/forgotPassword')}}">Forgot password?</a></small>
                   <button name ="submit" class="form-control text-center btn-danger mt-3" type="submit">LOGIN</button>
                   </form>
               </div>

           </div>
       </div>

   @endsection
   @section('script')
   <script type="text/javascript">
$('.loginForm').on('submit', function(event) {
    event.preventDefault();
    let formData = $(this).serializeArray();
    let userName = formData[0]['value'];
    let userPass = formData[1]['value'];
    axios.post('/login', {
    user : userName,
    pass : userPass
    }).
    then(function(response) {
            if(response.status == 200 && response.data == 1){
                window.location.href="/";
            }
            else{
                alert("No user found!")
            }
    }).catch(function(error) {
        alert(error);
    });


});
   </script>
   @endsection
