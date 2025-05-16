@extends('layouts.app')
@push('styles')
    <style>
        body {
            background-image: url('{{ asset('img/background.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
@endpush

@section('content')
    <div class="flex flex-col items-center justify-center pt-10 max-h-l">
        <h1 class="text-3xl text-center font-sans mb-6">
            Hello World
        </h1>
        <div class="flex space-x-4">
            <a href="{{ route('forms.index') }}" class="underline text-blue-500 hover:text-blue-700">Form DashBoard</a>
            <span class="text-gray-400">|</span>
            <a href="{{ route('todos.index') }}" class="underline text-blue-500 hover:text-blue-700">To do Dashboard</a>
            <span class="text-gray-400">|</span>
            <a href="{{ route('posts.index') }}" class="underline text-blue-500 hover:text-blue-700">Post Dashboard</a>
        </div>
    </div>
@endsection
