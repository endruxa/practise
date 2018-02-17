@extends('welcome')
@section('background_image')
    <header class="intro-header" style="background-image: url('{{asset('/img/home-bg.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>My Blog</h1>
                        <hr class="small">
                        <span class="subheading">My first blog</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-4">
            <h2>Welcome:</h2>
            <p>{{Auth::user()->name}}</p>
            <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
     </div>
   </div>
@endsection
