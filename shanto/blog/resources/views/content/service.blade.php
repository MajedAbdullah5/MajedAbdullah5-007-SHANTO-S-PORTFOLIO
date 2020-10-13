<div class="Servicecontainer">
    <h3 class="text-center p-2">SERVICES</h3>
    <div class="container">
        <div class="row mt-3">
            @foreach($ServiceKey as $key)
                    <div class="col col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{$key->service_image}}"
                             alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a>Card title</a></h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the
                                card's
                                content.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    <!-- Card -->
    {{--    <div class="row mt-3">--}}
    {{--        @foreach($ServiceKey as $key)--}}
    {{--        <div class="col col-md-3">--}}
    {{--            <div class="card servicecard">--}}
    {{--             <img class="mb-3" style="width: 120px;height: 120px; margin: auto; padding-top: 10px;" src="{{$key->service_image}}">--}}
    {{--                <h3 style="color: chocolate;">{{$key->service_name}}</h3>--}}
    {{--                <h6>{{$key->service_des}}</h6>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        @endforeach--}}
    {{--    </div>--}}
{{--</div>--}}
{{--</div>--}}
