@extends('layouts.app')
@section('content')

{{-- <body class="max-w-7xl max-h-screen mx-auto bg-cover bg-center bg-no-repeat bg-fixed"> --}}
<article class="max-w-7xl mt-4 px-8 py-8 bg-black/10 rounded-lg">
    <!-- Blog Header -->
    <header class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">{{$post->title}}</h1>
        
        <div class="flex items-center space-x-4 text-gray-600">
            <span class="inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                {{$post->user->name}}
            </span>
            
            <span class="inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                {{$post->category->name}}
            </span>
            
            <span class="inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{$post->created_at->format('d M Y')}}
            </span>
        </div>
    </header>
    <!-- Featured Image (if exists) -->
            @foreach ($post->images as $image )
    <div class="mb-8 rounded-lg overflow-hidden shadow-lg">
        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{$post->title}}" class="w-full h-auto">
    </div>
    @endforeach

    <!-- Blog Content -->
    <div class="prose max-w-none">
        <p class="text-lg leading-relaxed text-gray-800 mb-6">{{$post->body}}</p>
    </div>

    <!-- Tags (if available) -->
    @if($post->tags)
    <div class="mt-8 pt-6 border-t border-gray-200">
        <div class="flex flex-wrap gap-2">
            @foreach($post->tags as $tag)
                <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">
                    #{{$tag->name}}
                </span>
            @endforeach
        </div>
    </div>
    @endif
</article>

@endsection