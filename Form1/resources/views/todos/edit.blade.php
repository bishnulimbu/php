@extends('layouts.app')
@section('content')
    <form action="{{route('todos.update',$todo->id)}}" method="POST" class="max-w-md mx-auto mt-8 p-6 font-sans border border-gray-300 rounded-md shadow-md">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">
                Title
            </label>
            <input type="text" value="{{$todo->title}}" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Gender
            </label>
            @foreach(['todo','doing','done'] as $status)
                <label class="inline-flex items-center mr-3">
                    <input type="radio" class="form-radio" name="status" value="{{$status}}"
                           {{old('status',$todo->status)==$status?'checked':''}}>
                    <span class="ml-2 text-gray-700">{{$status}}</span>
                </label>
            @endforeach
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Update
        </button>
    </form>
@endsection