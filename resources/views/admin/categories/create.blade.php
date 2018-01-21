@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.articles.parts._form_errors')

<div class="container">

    @component('admin.components._breadcrumb')

        @slot('title') Создание категории @endslot
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot

    @endcomponent

    <hr>

    <form class="form-horizontal" action="{{route('category.store', $category)}}" method="post">
    {{csrf_field()}}

    {{-- Form include --}}
    @include('admin.categories.parts._form')

    </form>

</div>

@endsection