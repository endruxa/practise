<label for="">Статус</label>
<select class="form-control" name="published">
    @if(isset($article->id))
        <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0" >Не опубликовано</option>
        <option value="1" >Опубликовано</option>
    @endif
</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{$article->title or ""}}" required>
<label for="">Slug (Уникальное значение)</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация " value="{{$article->slug or ""}}" readonly="">
<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple="">
    @include('admin.articles.parts._categories', ['categories' => $categories])
</select>
<label for="">Краткое описание</label>
<textarea class="form-control" id="description_short" name="description_short">{{$article->description_short or ""}}</textarea>
<label for="">Полное описание</label>
<textarea class="form-control" id="description" name="description">{{$article->description or ""}}</textarea>
<hr />
<label for="">Мета заголовок</label>
<textarea class="form-control" name="meta_title" placeholder="Мета заголовок">{{$article->meta_title or ""}}</textarea>
<label for="">Мета описание</label>
<textarea class="form-control" name="meta_description" placeholder="Мета описание">{{$article->meta_description or ""}}</textarea>
<label for="">Ключевые слова</label>
<textarea class="form-control" name="meta_keyword" placeholder="Ключевые слова, через запятую">{{$article->meta_keyword or ""}}</textarea>
<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">

<img id="holder" style="margin-top:15px;max-height:100px;">
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>

<script>
    CKEDITOR.replace('description',options);
</script>








