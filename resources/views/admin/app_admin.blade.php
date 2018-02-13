<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href={{asset('/css/alertify.css')}} id="alertifyCSS">


</head>
<body>
@include('admin.layouts.parts.navbar')

<div id="app">
    @yield('content')
</div>
<hr>

<!-- CKEditor -->
<script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Theme JavaScript -->
<script src="{{asset('/js/clean-blog.min.js')}}"></script>
<!-- Alertify -->
<script src="{{asset('/dist/sweetalert.min.js')}}"></script>
<script src="{{asset('/js/alertify.js')}}"></script>
@include('inc.message')
</body>
</html>