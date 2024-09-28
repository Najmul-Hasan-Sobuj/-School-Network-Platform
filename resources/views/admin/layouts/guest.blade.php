<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ get_site_logo_url() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
        .glass {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            width: 30rem;
        }
    </style>

    <link href="{{ asset('admin/src/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/cdn/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/cdn/jquery.css') }}" />
    <script src="{{ asset('admin/cdn/jquery.js') }}"></script>
    <script src="{{ asset('admin/cdn/swiper.js') }}"></script>
    <script src="{{ asset('admin/src/js/tailwind3.3.3.js') }}"></script>
    <script src="{{ asset('admin/cdn/goggleapi.js') }}"></script>
    <script src="{{ asset('admin/cdn/fontawsome.js') }}" crossorigin="anonymous"></script>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>

<body class="font-sans text-gray-900 antialiased">
    {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <img src="{{ get_site_logo_url() }}" alt="" class="w-20 h-20 fill-current text-gray-500">
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        </div>
    </div> --}}
    {{ $slot }}

</body>

</html>
