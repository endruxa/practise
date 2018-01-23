<!doctype html>

<html lang="{{ app()->getLocale() }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>@yield('title')Blog</title>
        <meta name="keywords" content="@yield('meta_keyword')">
        <meta name="description" content="@yield('meta_description')">

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href='{{asset('vendor/https/family-lora.css')}}' rel='stylesheet' type='text/css'>
        <link href='{{asset('vendor/https/family-open.css')}}' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/folder.png') }}">

    </head>

<body>
    <div id="app">

        @include('layouts.header')

        @include('background_image')

        @yield('content')

        @include('content.content')

        <hr>
    </div>

    <!-- Footer -->
@include('layouts._footer')

    <!-- jQuery -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('js/contact_me.js')}}"></script>
    <!-- Theme JavaScript -->
    <script src="{{asset('js/clean-blog.min.js')}}"></script>
</body>

</html>