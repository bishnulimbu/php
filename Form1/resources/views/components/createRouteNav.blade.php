@props(['routeName'])
@if (Route::currentRouteName() == $routeName . '.index')
    @if ($routeName === 'posts')
        @guest
            <span>You need to be logged in to create Post</span>
        @else
            <a href="{{ route($routeName . '.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md transition-colors duration-150">{{ $slot }}</a>
        @endguest
    @else
        <a href="{{ route($routeName . '.create') }}"
            class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md transition-colors duration-150">{{ $slot }}</a>
    @endif
@endif
