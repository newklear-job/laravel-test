@extends('layouts.app')
@section('title', 'Last news')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    @forelse ($articles as $article)
                        <div class="col-sm-6">
                            <div class="jumbotron">
                                <h2><a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
                                <p>{!! $article->description_short !!}</p>
                                <p>Категории:
                                    @forelse($article->categories as $category)
                                        <a href="{{route('category', $category->slug)}}">{{$category->title}}</a>
                                    @empty
                                        Нет категорий
                                    @endforelse
                                </p>
                            </div>
                        </div>

                    @empty
                        <h2 class="text-center">Нет новостей</h2>

                    @endforelse

                    <div class="col-sm-12">
                        <div class="float-right">
                            {{$articles->links()}}
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <h2>Последние категории:</h2>
                @forelse ($categories as $category)
                <h2><a href="{{route('category', $category->slug)}}">{{$category->title}}</a></h2>

                @empty
                    <h2 class="text-center">Нет категорий</h2>

                @endforelse
                </div>
            </div>


        </div>

    </div>

@endsection
