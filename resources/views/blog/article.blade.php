@extends('welcome')

@section('title', $article->meta_title)
@section('meta_keyword', $article->meta_keyword)
@section('meta_description', $article->meta_description)

@section('css')
    @parent


@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h2>{{$article->title}}</h2>
                <p>{!! $article->description !!}</p>
                <p class="post-meta">Created by<a href="#"><br></a>{{$article->created_at}}</p>
            </div>
        </div>
    </div>

@endsection

@section('comments')

    @include('comments.comments_block', ['essence' => $article])

@endsection

@section('js')
    @parent
    <!-- Comments -->


@endsection