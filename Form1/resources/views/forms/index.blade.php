@extends('layouts.app')
@section('content')
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($infos as $info)
            <div class="bg-white p-6 rounded-md border border-gray-200 shadow-md">
                <div>
                    <p class="mb-2 text-gray-700"><strong class="font-semibold">First Name:</strong> {{ $info->first_name }}</p>
                    <p class="mb-2 text-gray-700"><strong class="font-semibold">Last Name:</strong> {{ $info->last_name }}</p>
                    <p class="mb-2 text-gray-700"><strong class="font-semibold">Email:</strong> {{ $info->email }}</p>
                    <p class="mb-4 text-gray-700"><strong class="font-semibold">Gender:</strong> {{ $info->gender }}</p>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    {{-- View Button --}}
                    <a href="{{ route('forms.show', $info->id) }}"
                       class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md shadow transition-colors duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <span class="sr-only">View</span>
                    </a>

                    {{-- Edit Button --}}
                    <a href="{{ route('forms.edit', $info->id) }}"
                       class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white p-2 rounded-md shadow transition-colors duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11 5h6m2 2l-9 9H4v-6l9-9z"/>
                        </svg>
                        <span class="sr-only">Edit</span>
                    </a>

                    {{-- Delete Button --}}
                    <form action="{{ route('forms.destroy', $info->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white p-2 rounded-md shadow transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            <span class="sr-only">Delete</span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection