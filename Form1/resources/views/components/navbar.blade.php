<nav class="bg-gray-100 py-4 rounded-lg mb-4 p-3">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Home</a>
        </div>
        <div class="flex space-x-6">
            <a href="{{ route('forms.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Form</a>
            <a href="{{ route('todos.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Todo</a>
            <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Post</a>
        </div>
        <div>
                <x-createRouteNav routeName="forms">Create Form</x-createRouteNav>
                <x-createRouteNav routeName="todos">Create Todo</x-createRouteNav>
                <x-createRouteNav routeName="posts">Create Post</x-createRouteNav>
            @auth
                @if (auth()->user())
                    <a href="{{ route('admin') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md transition-colors duration-150">admin</a>
                @endif
            @endauth
        </div>
<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="text-blue-500 hover:text-blue-700 font-semibold">
        @auth
            {{ Auth::user()->name }}
        @else
            Account
        @endauth
    </button>

    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg">
        @auth
            <div class="px-4 py-2 text-gray-700">{{ Auth::user()->name }}</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-blue-500 hover:bg-gray-100">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block px-4 py-2 text-blue-500 hover:bg-gray-100">Login</a>
            <a href="{{ route('register') }}" class="block px-4 py-2 text-blue-500 hover:bg-gray-100">Register</a>
        @endauth
    </div>
</div>
</div>
    </div> <!-- This closes the container div -->
</nav> <!-- This closes the nav tag -->
