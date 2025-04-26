<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <title>Laravel Learning Currently</title>
</head>
<body class="max-w-7xl mx-auto">
        @include('components.navbar')
        @yield('content')
        {{-- toast notification --}}
@if(session('success'))
    <div class="fixed top-4 right-4 bg-green-500 text-white px-4 py-3 rounded shadow-lg z-50 animate-bounce">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="fixed top-4 right-4 bg-red-500 text-white px-4 py-3 rounded shadow-lg z-50 animate-bounce">
        {{ session('error') }}
    </div>
@endif
<script>
    setTimeout(() => {
        document.querySelectorAll('[class*="fixed"]').forEach(el => el.remove());
    }, 1000); // 3 seconds
</script>
</body>
</html>