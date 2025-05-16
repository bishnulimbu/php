<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Learning Currently</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Swiper CSS (version 11 for consistency with JS) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @stack('styles')

   <!-- Swiper JS (⚠ You included version 10 while using v11 CSS — mismatch!) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- SortableJS (if you're using drag-and-drop) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

 <!-- add custom inline styles for the background -->
</head>

{{-- <body class="max-w-7xl max-h-screen mx-auto bg-cover bg-center bg-no-repeat bg-fixed"
    style="background-image: url('{{ asset('storage/background.jpg') }}');"
> --}}
<body class="max-w-7xl max-h-screen mx-auto ">
    {{-- Navbar --}}
    @include('components.navbar')

    <!-- Page Heading (only if $header is set) -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

<div class="bg-white bg-opacity-85 min-h-screen">
    <!-- Page Content -->
    @yield('content')
</div>

    <!-- Toast Notifications (success and error) -->
    @if (session('success'))
        <div class="fixed top-4 right-4 bg-green-500 text-white px-4 py-3 rounded shadow-lg z-50 animate-bounce">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="fixed top-4 right-4 bg-red-500 text-white px-4 py-3 rounded shadow-lg z-50 animate-bounce">
            {{ session('error') }}
        </div>
    @endif


    @stack('scripts')

    <!-- Remove Toast Notifications after a brief delay -->
<script>
    setTimeout(() => {
        document.querySelectorAll('.fixed.top-4.right-4').forEach(el => el.remove());
    }, 3000);
</script>
</body>

</html>
