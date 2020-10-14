@extends('Layout.app')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card dashboardBox">
                    <div class="card-title my-3">
                       <h4 class="mb-4">TOTAL VIEWS</h4>
                       <h3>{{\App\visitorsModel::count()}}</h3>
                    </div>
                </div>
            </div> <div class="col-md-3">
                <div class="card dashboardBox2">
                    <div class="card-title my-3">
                       <h4 class="mb-4">TOTAL SERVICES</h4>
                       <h3>{{\App\ServiceModel::count()}}</h3>
                    </div>
                </div>
            </div> <div class="col-md-3">
                <div class="card dashboardBox3">
                    <div class="card-title my-3">
                       <h4 class="mb-4">TOTAL PROJECTS</h4>
                       <h3>{{\App\ProjectModel::count()}}</h3>
                    </div>
                </div>
            </div> <div class="col-md-3">
                <div class="card dashboardBox4">
                    <div class="card-title my-3">
                       <h4 class="mb-4">TOTAL MESSAGES</h4>
                       <h3>{{\App\MessageModel::count()}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('.dashboardBox').click(function ()
        {
           window.location.href="/visitors";
        });
        $('.dashboardBox2').click(function ()
        {
           window.location.href="/services";
        });
        $('.dashboardBox3').click(function ()
        {
           window.location.href="/project";
        });
        $('.dashboardBox4').click(function ()
        {
           window.location.href="/messages";
        });
    </script>
@endsection
