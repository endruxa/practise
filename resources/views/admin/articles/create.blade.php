@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components._breadcrumb')
            @slot('title') Создание новости @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent
        <hr>
        <form class="form-horizontal" action="{{route('article.store', $article)}}" method="post">
            @include('errors._form_errors')
            {{csrf_field()}}
        @include('admin.articles.parts._form')
            <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>
    </div>
@endsection