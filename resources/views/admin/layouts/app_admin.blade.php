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
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
</head>
<body>
@include('admin.layouts.parts.navbar')

    <div class="jumbotron">
        <div class="container">
        @if (session()->has('flash'))
                <h1>Hello, world!</h1>
                <p>Welcome</p>
                <div class="alert alert-{{ session('flash.type', 'danger') }}">{{ session('flash.message') }}</div>
            @endif
        </div>
    </div>
<!-- Main Content -->
<div id="app">
    @yield('content')
</div>
<hr>

<!-- jQuery -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Theme JavaScript -->
<script src="{{asset('js/app.js')}}"></script>

</body>
</html>