<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=0.4">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/a559ebe3f4.js"></script>
    <link href="{{asset('css/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/datatables-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col col-md-2">
                <h4 class="header">DASHBOARD</h4>
            <div class="sidebar">
                <ul class="list-ul">
                    <li><a href="{{url('/')}}"><i class="fas fa-home"></i>&emsp;HOME</a></li>
                    <li><a href="{{url('/portfolio')}}"><i class="fas fa-user-cog"></i>&emsp;PORTFOLIO</a></li>
                    <li><a href="{{url('/visitors')}}"><i class="fas fa-users"></i>&emsp;VISITORS</a></li>
                    <li><a href="{{url('/services')}}"><i class="fas fa-globe"></i>&emsp;SERVICES</a></li>
                    <li><a href="{{url('/project')}}"><i class="fas fa-code"></i>&emsp;PROJECTS</a></li>
                    <li><a href="{{url('/messages')}}"><i class="fas fa-envelope"></i>&emsp;MESSAGES</a></li>
                    <li><a href="{{url('/change_password')}}"><i class="fas fa-key"></i>&emsp;CHANGE PASSWORD</a></li>
                </ul>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <span>&emsp;<a class="btn btn-danger signout" href="{{url('/logout')}}"><i class="fas fa-sign-out-alt fa-1x" ></i>&emsp;LOGOUT</a></span>
            </div>
        </div>

        <div class="col-md-10 mw-100">
            @yield('content')
            <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/datatables-select.min.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <script type="text/javascript" src="{{asset('js/customJs.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/all.js')}}"></script>
            @yield('script')
        </div>
    </div>
</body>

</html>
