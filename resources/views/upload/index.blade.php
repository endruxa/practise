<div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
    <input id="thumbnail" class="form-control" type="text" name="filepath">
</div>
<img id="holder" style="margin-top:15px;max-height:100px;">

<script src="{{asset('vendor/unisharp/laravel-filemanager/public/js/lfm.js')}}"></script>

<textarea id="my-editor" name="content" class="form-control"></textarea>

<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>

<script>
    CKEDITOR.replace('my-editor', options);
</script>