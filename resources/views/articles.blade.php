@extends('layout')

@section('content')
    <div class="bg-gray-50 text-black dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full">
                @include('header')
                <main class="mt-6 max-w-2xl lg:max-w-7xl md:m-auto mx-4">
                    <div class="grid mt-6 lg:grid-cols-[25%_1fr] gap-6">
                        <div>
                            <div class="flex flex-wrap">
                            @foreach ($tags as $tag)
                                <a class="taglink leading-4 bg-[#565656] text-white py-1.5 px-2.5 rounded-2xl mr-1 mt-1" href="/articles/{{$tag->url}}">{{$tag->label}}</a>
                            @endforeach
                            </div>
                        </div>
                        <div class="grid gap-6">
                        @foreach ($articles as $article)
                            <div data-id="{{$article->id}}" class="article border border-gray-200">
                                <a href="/articles/{{$article->id}}">
                                    <img alt="Article image" class="min-w-full" src="https://placehold.co/900x450">
                                </a>
                                <div class="p-3">
                                    <a href="/articles/{{$article->id}}">
                                        <h1 class="text-xl"> {{$article->title}} </h1>
                                        <p> {{Str::substr($article->body, 0, 100)}}... </p>
                                    </a>
                                    <span class="article__info grid grid-cols-2">
                                        @include('article-views', ['views' => $article->views])
                                        @include('article-likes', ['likes' => $article->likes])
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        {{ $articles->links() }}
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </div>
@endsection
