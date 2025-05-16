@extends('layouts.app')
@section('content')
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data"
        class="max-w-md mx-auto mt-8 p-6 font-sans border border-gray-300 rounded-md shadow-md">
        @method('PUT')
        @csrf

        {{-- Title Field --}}
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                Title
            </label>
            <input type="text" value="{{ old('title', $post->title) }}" name="title" id="title"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('title')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category Field --}}
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">
                Category
            </label>
            <select name="category_id" id="category_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach (App\Models\Category::all() as $item)
                    <option value="{{ $item->id }}"
                        {{ old('category_id', $post->category_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Body Field --}}
        <div class="mb-4">
            <label for="body" class="block text-gray-700 text-sm font-bold mb-2">
                Body
            </label>
            <textarea name="body" id="body"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('body', $post->body) }}</textarea>
            @error('body')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Slug Field --}}
        <div class="mb-4">
            <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">
                Slug
            </label>
            <input type="text" value="{{ old('slug', $post->slug) }}" name="slug" id="slug"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('slug')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Images Field -->
        <div class="mb-4">
            <label for="images" class="block text-gray-700 text-sm font-bold mb-2">
                Upload Images (Leave empty to keep current images)
            </label>
            <input type="file" name="images[]" id="images" multiple
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('images')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
            @error('images.*')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror

            <!-- Current Images Preview -->
            @if ($post->images->count() > 0)
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">Current Images:</p>
                    <div class="grid grid-cols-3 gap-2">
                        @foreach ($post->images as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Post image"
                                    class="w-full h-24 object-cover rounded">
                                <button type="button"
                                    class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs"
                                    onClick="deleteImage({{ $image->id }})">×</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- New Image preview section -->
        <div id="imagePreviewContainer" class="grid grid-cols-3 gap-4 mb-4"></div>

        <div class="mb-4">
            <label for="is_published" class="block text-gray-700 text-sm font-bold mb-2">Publish?</label>
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" id="is_published" value="1"
                class="form-checkbox h-5 w-5 text-green-500 focus:outline-none focus:shadow-outline"
                {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
            <span class="text-gray-700 text-sm ml-2">Check to publish</span>
            @error('is_published')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Update Post
        </button>
    </form>

    <script>
        // Image deletion with confirmation
        function deleteImage(imageId) {
            if (confirm("Are you sure you want to delete this image?")) {
                fetch(`{{ route('images.delete', ':id') }}`.replace(':id',imageId), {
                    method: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    credentials: 'same-origin'
                })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    } else {
                        alert("Failed to delete image");
                        console.error("Deletion failed", response);
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
            }
        }

        // Preview new images before upload
        document.getElementById('images').addEventListener('change', function(e) {
            const container = document.getElementById('imagePreviewContainer');
            container.innerHTML = '';
            
            Array.from(e.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = (event) => {
                    const div = document.createElement('div');
                    div.className = 'relative';
                    div.innerHTML = `
                        <img src="${event.target.result}" class="w-full h-24 object-cover rounded">
                        <button type="button" class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs" onclick="this.parentElement.remove()">×</button>
                    `;
                    container.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection