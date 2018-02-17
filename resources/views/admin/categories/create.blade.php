@extends('admin.app_admin')

@section('content')

<div class="container">

    @component('admin.components._breadcrumb')

        @slot('title') Создание категории @endslot
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot

    @endcomponent

    <hr>
    @include('errors._form_errors')
        <form class="form-horizontal" action="{{route('admin.category.store')}}" method="post">
                 {{csrf_field()}}
    @include('admin.categories.parts._form')
            <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>
</div>

@endsection