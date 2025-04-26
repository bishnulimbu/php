@extends('layouts.app')
@section('content')
    <form action="{{route('todos.store')}}" method="POST" class="max-w-md mx-auto mt-8 p-6 font-sans border border-gray-300 rounded-md">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                Title
            </label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Status
            </label>
            <label class="inline-flex items-center mr-3">
                <input type="radio" class="form-radio" name="status" value="todo">
                <span class="ml-2 text-gray-700">Todo</span>
            </label>
            <label class="inline-flex items-center mr-3">
                <input type="radio" class="form-radio" name="status" value="doing">
                <span class="ml-2 text-gray-700">Doing</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" class="form-radio" name="status" value="done">
                <span class="ml-2 text-gray-700">Done</span>
            </label>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Submit
        </button>
    </form>
@endsection