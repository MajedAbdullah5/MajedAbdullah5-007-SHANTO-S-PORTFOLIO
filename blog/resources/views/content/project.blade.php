<h3 class="text-center p-5">PROJECT</h3>
<div id="testimonial">
    <div class="owl-carousel owl-theme">

        @foreach($projectKey as $project)
            <div class="testimonial">
            <!-- Card -->
                <div class="container-fluid">
                    <div class="item text-center">
                        <div class="card card-image ">
                            <!-- Content -->
                            <img src="{{$project->project_image}}" alt="">
                            <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 radius">
                                <div>
                                    <h5 class="pink-text"><i class="fas fa-project-diagram"></i></h5>
                                    <h3 class="card-title pt-2"><strong> {{$project->project_name}}</strong></h3>
                                    <a href="{{url('/projectView')}}/{{$project->id}}" class="btn btn-pink"><i
                                            class="fas fa-clone left"></i> View project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card -->
                {{--            <div class="item">--}}
                {{--                <div class="testimonial">--}}
                {{--                    <div class="card" height="500px">--}}
                {{--                        <div class="card-body">--}}
                {{--                            <img alt="image/classroom.png" src="{{$project->project_image}}">--}}
                {{--                            <div class="card-title">--}}
                {{--                                <h1>{{$project->project_name}}</h1>--}}
                {{--                            </div>--}}
                {{--                            <div class="card-text">--}}
                {{--                                {{$project->project_des}}--}}
                {{--                            </div>--}}
                {{--                            <a href="{{url('/projectView')}}/{{$project->id}}" class="btn btn-outline-danger viewProject">View</a>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
            </div>
            @endforeach

    </div>
</div>
</div>
