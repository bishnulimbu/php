<x-layout>
<x-slot:heading>Job page</x-slot:heading>

<div class="space-y-4">
        @foreach($jobs as $job)
        <div class="p-4 border border-gray-300 rounded-lg shadow-sm hover:shadow-md transition">
        <a href="/job/{{$job['id']}}" class="block space-y-1">
        <div class="font-semibold text-blue-600 text-lg">{{ $job->employer->name }}</div>
        <div class="text-sm font-medium text-gray-800">{{ $job['title'] }}</div>
        <div class="text-sm text-green-700">Pays: {{ $job['salary'] }}</div>

        </a>
        <form method='POST' action="job/{{$job->id}}" id="delete-form">
        @csrf
            @method("DELETE")
            <button form="delete-form" class="rounded-lg text-white p-1 mt-1 bg-red-600">Delete</button>
            </form>
        </div>
        @endforeach
            </div>

            <div class="mt-6">
            {{ $jobs->links() }}
    </div>
    </x-layout>
