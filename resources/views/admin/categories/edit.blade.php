@extends('admin.layouts.app_admin')

@section('content')

    {{--@include('errors._form_errors')--}}

    @component('admin.components._breadcrumb')
        @slot('title') Редактирование категории @endslot
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot
    @endcomponent

    {{ Form::model($category, ['route' => ['admin.category.update'], 'method' => 'put']) }}
    @include('admin.categories.parts._form')
    {{ Form::close() }}


   {{-- <div class="container">



        <hr>

        --}}{{--<form class="form-horizontal" action="{{route('admin.category.update', dd($category))}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            --}}{{----}}{{--Form include--}}{{----}}{{--


        </form>--}}{{--
    </div>
--}}
@endsection

@section('title', 'Редактирование записи ' . $category->title)