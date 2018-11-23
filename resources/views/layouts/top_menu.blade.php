@foreach ($categories as $category)
    <a class="" href="{{url("/blog/category/$category->slug")}}">
    <li class="nav-item" onmouseover="this.style.backgroundColor='#aaa';" onmouseout="this.style.backgroundColor='#fff';">
        {!! $delimiter ?? "" !!} {{$category->title}}
    </li>
    </a>
    @if ($category->children->where('published', 1)->count())
        @include('layouts.top_menu', ['categories' => $category->children, 'delimiter'  => ' - ' . $delimiter])
    @else

    @endif



@endforeach
