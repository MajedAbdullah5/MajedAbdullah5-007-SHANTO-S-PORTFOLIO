@extends('Layout.app')
@section('title','Projects')
@section('content')
    <div class="container-fluid">
        <h5 class="p-2">LIST OF PROJECTS</h5>
        <div class="row">
            @foreach($result as $data)
                <div class="col-md-4">
                    <!-- Card Dark -->
                    <div class="card">
                        <!-- Card image -->
                        <div class="view overlay">
                            <img class="card-img-top" src="{{$data->project_image}}"
                                 alt="Card image cap">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Card content -->
                        <div class="card-body elegant-color white-text rounded-bottom">

                            <!-- Social shares button -->
                            <a class="activator waves-effect mr-4"><i class="fas fa-share-alt white-text"></i></a>
                            <!-- Title -->
                            <h4 class="card-title">{{$data->project_name}}</h4>
                            <hr class="hr-light">
                            <!-- Text -->
                            <p class="card-text white-text mb-4">Project Link &emsp;: <a href="{{$data->project_link}}">&emsp; {{$data->project_link}}</a></p>
                            <!-- Link -->
                            <a href="{{url('/projectView')}}/{{$data->id}}" class="white-text d-flex justify-content-end">
                                <h5>View project <i class="fas fa-angle-double-right"></i></h5>
                            </a>
                        </div>
                    </div>
                    <!-- Card Dark -->
                </div>
            @endforeach
        </div>

    </div>
@endsection
