@extends('welcome')

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
