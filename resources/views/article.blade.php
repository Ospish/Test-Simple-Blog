@extends('layout')

@section('content')
    <div class="bg-gray-50 text-black dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full">
                @include('header')
                <main id="article" data-id="{{$article->id}}" class="article mt-6 flex justify-center max-w-2xl lg:max-w-7xl md:m-auto mx-4">
                    <div class="lg:w-3/4">
                        <h1 class="text-4xl mb-3 font-bold"> {{$article->title}} </h1>
                        <img alt="Article image" class="min-w-full" src="https://placehold.co/900x450">
                        <span class="article__info grid grid-cols-2">
                            @include('article-views', ['views' => $article->views])
                            @include('article-likes', ['likes' => $article->likes])
                        </span>
                        <div class="my-4">
                        @foreach($article->tags as $tag)
                            <span class="bg-[#565656] text-white py-1.5 px-2.5 rounded-2xl"> {{$tag->label}}</span>
                        @endforeach
                        </div>
                        @foreach(explode("\n", $article->body) as $paragraph)
                            <p class="mt-3">{{$paragraph}}</p>
                        @endforeach

                        <hr class="mt-4">
                        <div class="text-2xl mt-4">Оставить комментарий</div>
                        <form class="flex flex-col" id="comment_form">
                            <input id="comment_title" placeholder="Заголовок комментария" class="border px-2 py-1 mt-2" name="title" type="text">
                            <textarea id="comment_body" rows="4" placeholder="Содержимое комментария"  class="border px-2 py-1 mt-2" name="body"></textarea>
                            <button class="border mt-2" type="submit">Отправить</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </form>
                        <div class="text-2xl mt-4">Комментарии</div>
                        @foreach($article->comments as $comment)
                            <div class="comment my-2 border border-gray-200 p-2 mt-2">
                                <div class="text-xl"> {{$comment->title}}</div>
                                <p class="mt-2 mb-1"> {{$comment->body}}</p>
                            </div>
                        @endforeach
                    </div>
                </main>
                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </div>
@endsection

