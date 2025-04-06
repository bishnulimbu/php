<x-layout >
    <x-slot:heading>Job page</x-slot:heading>

    <ul>
    @foreach($jobs as $job)
        <li>
            <a href="/job/{{$job['id']}}">
            {{ $job['title']  }} pays -> {{$job['salary']}}</li>
        @endforeach
        </ul>
</x-layout>


