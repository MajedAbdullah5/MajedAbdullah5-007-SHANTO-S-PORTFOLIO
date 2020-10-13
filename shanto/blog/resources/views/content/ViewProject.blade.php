@extends('Layout.app')
@section('title','View Projects')
@section('content')
@foreach($result as $data)
{{--    <h1> {{$data->project_link}}</h1>--}}
    <div class="container p-4">
        <h1>{{$data->id}} | {{$data->project_name}}</h1>
        <div class="row">
            <div class="col-md-12 mb-5">
                <img class="project_image" src="{{$data->project_image}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <img class="project_image" src="{{$data->project_image1}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <img class="project_image" src="{{$data->project_image2}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <img class="project_image" src="{{$data->project_image3}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <img class="project_image" src="{{$data->project_image4}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <img class="project_image" src="{{$data->project_image5}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <img class="project_image" src="{{$data->project_image6}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <img class="project_image" src="{{$data->project_image7}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <img class="project_image" src="{{$data->project_image8}}" alt="">
            </div>
        </div><div class="row">
            <div class="col-md-12 mb-5">
                <img class="project_image" src="{{$data->project_image9}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <img class="project_image" src="{{$data->project_image10}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <p>{{$data->project_des}}</p>
            </div>
        </div>
    </div>
@endforeach
@endsection
