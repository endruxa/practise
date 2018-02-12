@extends('welcome')

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

@section('comments')

    @include('comments.comments_block', ['essence' => $article])

@endsection
