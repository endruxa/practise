@extends('welcome')

@section('title', $category->title)

@section('content')

    <div class="container">
        @forelse($categories->articles->where('published', 1)->get() as $article )
        <div class="row">
            <div class="col-sm-12">
                <h2><a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
                <p>{!! $article->description_short !!}</p>
            </div>
        </div>
            @empty
            <h2 class="text-center">Пусто</h2>
        @endforelse
        {{$categories->links()}}
    </div>

@endsection