@extends('layouts.app')
@section('content')
<div class="mx-auto max-w-7xl px-6 lg:px-8 py-8">
    <div class="mx-auto lg:mx-0">
        <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
            Admin Page
        </h2>
        <p class="mt-2 text-lg leading-8 text-gray-600">
            Manage all your posts. Admins can edit/delete any post.
        </p>
        
        <div class="mt-8 overflow-x-auto shadow ring-1 ring-black ring-opacity-5 rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Image</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Category</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Author</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($posts as $post)
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 sm:pl-6">
                            @if($post->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $post->images->first()->image_path) }}" 
                                     alt="{{ $post->title }}"
                                     class="h-16 w-16 object-cover rounded-md">
                            @else
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">
                            <div class="font-medium">{{ $post->title }}</div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $post->category->name }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $post->user->name }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <div class="flex space-x-2">
                                <a href="{{ route('posts.edit', $post->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</div>



@endsection