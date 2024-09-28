<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ get_site_logo_url() }}" />
    <link href="{{ asset('admin/src/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/cdn/jquery.css') }}" />
    <script src="{{ asset('admin/cdn/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/cdn/data_table.css') }}" />
    <script src="{{ asset('admin/src/js/tailwind3.3.3.js') }}"></script>
    <script src="{{ asset('admin/cdn/goggleapi.js') }}"></script>
    <script src="{{ asset('admin/cdn/fontawsome.js') }}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('admin/cdn/swiper.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body class="h-screen">
    <div class="flex w-full h-full">
        <nav class="bg-prime navbar active relative h-full">
            @include('admin.layouts.partial.sidebar')
        </nav>
        <!-- Page Content -->
        <main class="flex flex-col justify-between overflow-y-auto max-h-full  main active">
            <div class="">
                @include('admin.layouts.partial.navbar')
                <div class="overflow-y-auto max-w-full lg:p-10 p-4">
                    {{ $slot }}
                </div>
            </div>
            @include('admin.layouts.partial.footer')
        </main>
    </div>
    <script src="{{ asset('admin/cdn/swiper.js') }}"></script>
    <script src="{{ asset('admin/src/js/index.js') }}"></script>
    <script src="{{ asset('admin/cdn/data_table.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="{{ asset('admin/js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
