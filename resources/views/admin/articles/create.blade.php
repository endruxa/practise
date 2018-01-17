@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components._breadcrumb')
            @slot('title') Создание новости @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent

        <hr>
            {{--@include('admin.articles.parts._form_errors')--}}
        <form class="form-horizontal" action="{{route('admin.article.store')}}" method="post">
            {{csrf_field()}}

            {{-- Form include --}}
        @include('admin.articles.parts._form')

            <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>
    </div>

@endsection