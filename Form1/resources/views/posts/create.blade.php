@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-semibold mb-4">Create New Post</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" value="{{ old('title') }}" name="title" id="title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                @error('title')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                <select name="category_id" value={{ old('category_id') }} id="category_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    <option value="">-- Select Category --</option>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug(ShortTitle for seo):</label>
                <input type="text" value="{{ old('slug') }}" name="slug" id="slug"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('slug')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Body:</label>
                <textarea name="body" value="{{ old('body') }}" id="body" rows="5"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required></textarea>
                @error('body')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="images" class="block text-gray-700 text-sm font-bold mb-2">Upload Images</label>
                <input type="file" name="images[]" id="images" multiple
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('images')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                @error('images.*')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image preview section -->
            <div id="imagePreviewContainer" class="grid grid-cols-3 gap-4 mb-4"></div>

            <div class="mb-4">
                <label for="is_published" class="block text-gray-700 text-sm font-bold mb-2">Publish?</label>
                <input type="hidden" name="is_published" value="0">
                <input type="checkbox" name="is_published" id="is_published" value="1"
                    class="form-checkbox h-5 w-5 text-green-500 focus:outline-none focus:shadow-outline"
                    {{ old('is_published') ? 'checked' : '' }}>
                <span class="text-gray-700 text-sm ml-2">Check to publish</span>
                @error('is_published')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create Post
                </button>
                <a href="{{ route('posts.index') }}"
                    class="inline-block align-baseline font-semibold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
    <script>
        // JavaScript for image preview
        document.getElementById('images').addEventListener('change', function(event) {
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            imagePreviewContainer.innerHTML = '';

            for (let i = 0; i < event.target.files.length; i++) {
                const file = event.target.files[i];
                if (file.type.match('image.*')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'relative';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-32 object-cover rounded';
                        div.appendChild(img);

                        imagePreviewContainer.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
@endsection
