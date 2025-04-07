<x-layout >
    <x-slot:heading>Job page</x-slot:heading>

    <ul>
    @foreach($jobs as $job)
        <li>
<a href="/job/{{$job['id']}}" class="text-blue-700 hover:text-red-500 hover:underline">
            {{ $job['title']  }} pays -> {{$job['salary']}}</li>
        @endforeach
        </ul>
</x-layout>


