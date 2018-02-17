@extends('welcome')

@section('title')
{{$category->title}}
    {{--<ol class="breadcrumb">
        <li><a href="{{route('home')}}">{{$category}}</a></li>
        <li class="active">{{$active}}</li>
    </ol>--}}
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @forelse($articles as $article )
                <div class="post-preview">
                    <a href="{!! route('article', $article->slug) !!}">
                        <h2 class="post-title">
                        {!! $article->title !!}
                        </h2>
                        <h3 class="post-subtitle">
                            {!! $article->description_short !!}
                        </h3>
                    </a>
                    <p class="post-meta">Created in {!! $article->created_at->format('H:i d/m/Y') !!}</p>
                </div>
                @empty
                    <h2 class="text-center">Пусто</h2>
                @endforelse
            </div>
        </div>
        {{$articles->links()}}
   </div>

@endsection





