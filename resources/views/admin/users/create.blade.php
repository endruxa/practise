@extends('admin.app_admin')

@section('content')
    <div class="container">
        @component('admin.components._breadcrumb')
            @slot('title') Создание пользователя @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователи @endslot
        @endcomponent
        <hr>
        @include('errors._form_errors')
        <form class="form-horizontal" action="{{route('admin.users.store')}}" method="post">
            {{csrf_field()}}
            @include('admin.articles.parts._form')
        </form>
    </div>
@endsection
