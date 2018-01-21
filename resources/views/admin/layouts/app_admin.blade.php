<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')Blog</title>

    <!-- Styles -->
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
</head>

<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

        <!-- Admin menu -->
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('admin.index')}}">Панель состояния</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-expanded="false">Блог</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('category.index')}}">Категории</a> </li>
                        <li><a href="{{route('article.index')}}">Материалы</a> </li>
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                @endguest
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Main Content -->


    <div class="jumbotron">
        <div class="container">
            @if (session()->has('flash'))
                <h1>Hello, world!</h1>
                <p>Welcome</p>
                <div class="alert alert-{{ session('flash.type', 'danger') }}">{{ session('flash.message') }}</div>
            @endif
        </div>
    </div>

@yield('content')

<hr>

    <!-- Scripts -->
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>

    <!-- Theme JavaScript -->
    <script src="{{asset('js/clean-blog.min.js')}}"></script>

{{--<!-- Footer -->
@include('layouts._footer')--}}

</div>
</body>
</html>