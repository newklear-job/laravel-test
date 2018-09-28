@foreach ($categories as $category_list)

  <option value="{{$category_list->id ?? ""}}"

    @isset($category->id)

      @if ($category->parent_id == $category_list->id)
        selected=""
      @endif

      @if ($category->id == $category_list->id)
        disabled
      @endif

    @endisset

    >
    {!! $delimiter ?? "" !!}{{$category_list->title ?? ""}}
  </option>
{{$category_list->children->first()["children"]}}
  @if (count($category_list->children) > 0)

    @include('admin.categories.partials.categories', [
      'categories' => $category_list->children,
      'delimiter'  => ' - ' . $delimiter
    ])

  @endif
@endforeach
