@extends('layouts.app')
@section('content')
    <form action="{{route('forms.store')}}" method="POST" class="max-w-md mx-auto mt-8 p-6 font-sans border border-gray-300 rounded-md">
        @csrf
        <div class="mb-4">
            <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">
                First Name
            </label>
            <input type="text" name="first_name" id="first_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">
                Last Name
            </label>
            <input type="text" name="last_name" id="last_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                Email
            </label>
            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Gender
            </label>
            <label class="inline-flex items-center mr-3">
                <input type="radio" class="form-radio" name="gender" value="male">
                <span class="ml-2 text-gray-700">Male</span>
            </label>
            <label class="inline-flex items-center mr-3">
                <input type="radio" class="form-radio" name="gender" value="female">
                <span class="ml-2 text-gray-700">Female</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" class="form-radio" name="gender" value="gaeyyyy">
                <span class="ml-2 text-gray-700">I am not sure myself</span>
            </label>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Submit
        </button>
    </form>
@endsection