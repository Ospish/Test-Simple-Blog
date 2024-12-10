
    @extends('layout')

    @section('content')
        <div class="bg-gray-50 text-black dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full">
                    @include('header')

                    <main class="flex flex-col items-center justify-center">
                        <div class="w-full lg:min-h-24 bg-[#EFEFEF]">
                            <div class="my-6 relative w-full max-w-2xl lg:max-w-7xl md:mx-auto mx-2.5">
                                <h1 class="text-4xl">Статейник</h1>
                                <div class="mt-2">Всякие статьи</div>
                            </div>
                        </div>
                        <div class="relative w-full max-w-2xl lg:max-w-7xl">
                            <div class="grid mt-6 lg:grid-cols-3 gap-6">
                            @foreach ($articles as $article)
                                <div data-id="{{$article->id}}" class="article mt-2 mb-2 border border-gray-200">
                                    <a href="/articles/{{$article->id}}"><img alt="Article image" src="https://placehold.co/600x400"></a>
                                    <div class="p-3">
                                        <a href="/articles/{{$article->id}}">
                                            <h1 class="text-xl min-h-16"> {{$article->title}} </h1>
                                            <p class="min-h-20"> {{Str::substr($article->body, 0, 100)}}... </p>
                                        </a>
                                        <span class="article__info grid grid-cols-2">
                                            @include('article-views', ['views' => $article->views])
                                            @include('article-likes', ['likes' => $article->likes])
                                        </span>
                                    </div>
                                </div>
                            @endforeach
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
