@extends('layouts.app')
@section('content')
    <div class="flex flex-col items-center justify-center pt-10">
        <h1 class="text-3xl text-center font-sans mb-6">
            Hello World
        </h1>
        <div class="flex space-x-4">
            <a href="{{route('forms.index')}}" class="underline text-blue-500 hover:text-blue-700">Form DashBoard</a>
            <span class="text-gray-400">|</span>
            <a href="{{route('todos.index')}}" class="underline text-blue-500 hover:text-blue-700">To do Dashboard</a>
            <span class="text-gray-400">|</span>
            <a href="{{route('posts.index')}}" class="underline text-blue-500 hover:text-blue-700">Post Dashboard</a>
        </div>
    </div>
@endsection