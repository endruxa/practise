@foreach($categories as $category)

    <option value="{{$category->id or ""}}"
            {{--Редактирование новости--}}
            @isset($article->id)
                @foreach($article->categories as $category_article)
                    @if($category->id == $category_article->id)
                        selected="selected"
                    @endif
                @endforeach
            @endisset
    >
        {!! $delimiter or "" !!}{{$category->title or ""}}
    </option>

    {{--Вывод бесконечной вложенности категорий--}}
    @if(count($category->children) > 0)

        @include('admin.articles.parts._categories', [
        'categories' => $category->children,
        'delimiter' => ' - ' . $delimiter
        ])

    @endif
@endforeach