@extends('layouts.app')
@section('content')
    <form action="{{route('forms.update',$data1->id)}}" method="POST" class="max-w-md mx-auto mt-8 p-6 font-sans border border-gray-300 rounded-md shadow-md">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">
                First Name
            </label>
            <input type="text" value="{{$data1->first_name}}" name="first_name" id="first_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">
                Last Name
            </label>
            <input type="text" value="{{$data1->last_name}}" name="last_name" id="last_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                Email
            </label>
            <input type="email" name="email" value="{{$data1->email}}" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Gender
            </label>
            @foreach(['male','female','gaeyyyy'] as $gender)
                <label class="inline-flex items-center mr-3">
                    <input type="radio" class="form-radio" name="gender" value="{{$gender}}"
                           {{old('gender',$data1->gender)==$gender?'checked':''}}>
                    <span class="ml-2 text-gray-700">{{$gender}}</span>
                </label>
            @endforeach
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Update
        </button>
    </form>
@endsection