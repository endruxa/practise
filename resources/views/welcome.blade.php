<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="@yield('meta_keyword')">
        <meta name="description" content="@yield('meta_description')">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name'))</title>

@section('css')
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" media="all" href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" type="text/css" >
        <!-- Theme CSS -->
        <link rel="stylesheet" media="all" href="{{asset('/css/clean-blog.min.css')}}" type="text/css">
        <!-- Custom Fonts -->
        <link rel="stylesheet" media="all" href="{{asset('/vendor/font-awesome/css/font-awesome.min.css')}}" type="text/css">
        <link rel="stylesheet" media="all" href="{{asset('/vendor/https/family-lora.css')}}" type="text/css">
        <link rel="stylesheet" media="all" href="{{asset('/vendor/https/family-open.css')}}" type="text/css">
@show


    </head>
<body>

<div id="app">
    @include('layouts.header')
    @include('layouts.background_image')
    @yield('content')
    @yield('comments')
</div>
    <hr>
    <!-- Footer -->
    @include('layouts._footer')
    <!-- jQuery -->
@section('js')
    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Contact Form JavaScript -->
    <script src="{{asset('/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/js/contact_me.js')}}"></script>
    <!-- Theme JavaScript -->
    {{--<script src="{{asset('/js/app.js')}}"></script>--}}
    <script src="{{asset('/js/clean-blog.min.js')}}"></script>

@show

</body>
</html>