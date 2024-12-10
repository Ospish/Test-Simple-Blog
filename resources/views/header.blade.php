    <header class="max-w-2xl lg:max-w-7xl md:m-auto mx-4">
        <div class="w-full grid grid-cols-2 justify-center items-center gap-2 py-10">
            <div class="flex lg:justify-start">
                <a class="text-2xl" href="/">Статейник</a>
            </div>
            <div class="flex justify-end gap-6">
                <a @if ($_SERVER['REQUEST_URI'] !== '/') href="/" @else class="underline" @endif >Главная</a>
                <a @if ($_SERVER['REQUEST_URI'] !== '/articles') href="/articles" @else class="underline" @endif>Статьи</a>
            </div>
        </div>
    </header>
