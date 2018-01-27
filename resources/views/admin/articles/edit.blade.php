@extends('admin.app_admin')

@section('content')


    <div class="container">
        @component('admin.components._breadcrumb')
            @slot('title') Редактирование новости @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent
        <hr>
        <form class="form-horizontal" action="{{route('article.update', $article)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            @include('errors._form_errors')
        @include('admin.articles.parts._form')
            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>
    </div>
@endsection