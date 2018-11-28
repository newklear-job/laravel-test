<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Категории
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @foreach ($categories as $category)
                    @if ($category->children->where('published', 1)->count())
                        <li class="nav-item dropdown px-2 py-2">
                            <a href="{{url("/blog/category/$category->slug")}}">
                                {{$category->title}}
                            </a>
                            <a class="dropdown-toggle"
                               data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @include('layouts.top_menu', ['categories' => $category->children, 'delimiter' => '-'])
                            </ul>
                        </li>
                    @else
                        <li class="nav-item px-2 py-2">
                            <a class="" href="{{url("/blog/category/$category->slug")}}">{{$category->title}}</a>
                        </li>
                    @endif
                @endforeach


            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('login') . '?previous=' . Request::fullUrl() }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    @if (Auth::user()->isAn('admin'))
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('admin.index')}}">
                                Админ панель</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('profile', Auth::user()->name)}}">
                                User Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
