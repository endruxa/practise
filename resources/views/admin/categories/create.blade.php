@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components._breadcrumb')

        @slot('title') Создание категории @endslot
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot

    @endcomponent

    <hr>

    <form class="form-horizontal" action="{{route('category.store')}}" method="post">
    {{csrf_field()}}

    {{-- Form include --}}
    @include('admin.categories.parts._form')

    </form>

</div>

@endsection