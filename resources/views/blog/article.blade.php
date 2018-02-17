@extends('welcome')

@section('title', $article->meta_title)
@section('meta_keyword', $article->meta_keyword)
@section('meta_description', $article->meta_description)

@section('content')

    <header class="masthead">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-heading">
                            <h1>{!! $article->title !!}</h1>
                            <h2 class="subheading">{!! $article->description_short !!}</h2>
                            <span class="meta">Created in {{$article->created_at->format('H:i d/m/Y')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('css')
    @parent
    <link rel="stylesheet" media="all" href="{{asset('css/app.css')}}" type="text/css">
    <link rel="stylesheet"  href="{{asset('/comments/css/comments.css')}}" type="text/css">
@stop
@section('comments')
<div class="container">
    @include('comments.comments_block', ['essence' => $article])
</div>
@endsection

@section('js')
    @parent
   {{-- <script type="text/javascript" src="{{asset('js/app.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('/comments/js/comment-reply.js')}}"></script>
    <script type="text/javascript" src="{{asset('/comments/js/comment-scripts.js')}}"></script>
@stop
