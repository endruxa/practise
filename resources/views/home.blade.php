@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blog</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                            <input id="thumbnail" class="form-control" type="text" name="filepath">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">

                        <script src="/vendor/unisharp/laravel-filemanager/public/js/lfm.js"></script>

                        <textarea id="my-editor" name="content" class="form-control"></textarea>
                        <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
                        <script>
                            var options = {
                                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                            };
                        </script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                        <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

                        <script>
                            CKEDITOR.replace('my-editor', options);
                        </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
