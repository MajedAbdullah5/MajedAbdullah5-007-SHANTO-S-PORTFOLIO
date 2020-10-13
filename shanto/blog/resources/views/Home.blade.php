@extends('Layout.app')
@section('title','Home')
@section('content')
    @include('content.banner')
    @include('content.Quote')
    @include('content.service')
    @include('content.project')
    @include('content.Message')
@endsection

