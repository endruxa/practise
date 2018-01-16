@extends('admin.layouts.app_admin')

@section('content')
    {{--@include('admin.articles.parts._form_errors')--}}
    <div class="container">

        @component('admin.components._breadcrumb')
            @slot('title') Редактирование новости @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent

        <hr>

            @if(count($errors) > 0)
               {{-- <div class="alert alert-danger">--}}
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item alert-danger alert">{{ $error }}</li>
                        @endforeach
                    </ul>
                {{--</div>--}}
            @endif

        <form class="form-horizontal" action="{{route('admin.article.update', $article)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            {{-- Form include --}}
            @include('admin.articles.parts._form')

            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>
    </div>

@endsection