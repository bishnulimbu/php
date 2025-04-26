<nav class="bg-gray-100 py-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <a href="{{ route('/') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Home</a>
        </div>
        <div class="flex space-x-6">
            <a href="{{ route('forms.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Form</a>
            <a href="{{ route('todos.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Todo</a>
        </div>
        <div>
            @if (Route::currentRouteName() == 'forms.index')
                <a href="{{ route('forms.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md transition-colors duration-150">Create
                    Form</a>
            @endif
            @if (Route::currentRouteName() == 'todos.index')
                <a href="{{ route('todos.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md transition-colors duration-150">Create
                    Todo</a>
            @endif
        </div>
    </div>
</nav>
