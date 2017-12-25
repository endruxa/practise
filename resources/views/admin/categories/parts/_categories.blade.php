@foreach($categories as $category_list)

 <option value="{{$category_list->id or ""}}"
         {{--Редактирование категории--}}
    @isset($category->id)
    {{--Проверка на отношение к родительской категории--}}
    @if($category->parent_id == $category_list->id)
        selected= ""
    @endif
    {{--Исключение текущей категории--}}
    @if ($category->id == $category_list->id)
        hidden= ""
    @endif

    @endisset
 >
 {!! $delimiter or "" !!}{{$category_list->title or ""}}
 </option>

 {{--Вывод бесконечной вложенности категорий--}}
    @if(count($category_list->children) > 0)

        @include('admin.categories.parts._categories', [
        'categories' => $category_list->children,
        'delimiter' => ' - ' . $delimiter
        ])

    @endif

@endforeach