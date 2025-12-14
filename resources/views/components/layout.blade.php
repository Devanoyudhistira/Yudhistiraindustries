<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> {{ $title }} </title>
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/tsparticles-updater-color/2.12.0/tsparticles.updater.color.min.js" integrity="sha512-D6xmmyt32At/jC0fBIps4VpKToGpzlww4Q0ZHCv2vMq/ndvpKs1p6K5Uz6hIeCRJRbmElEdhKu0XbvJcjRh7Rg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Orbitron:wght@400..900&family=Style+Script&family=Zalando+Sans:ital,wght@0,200..900;1,200..900&display=swap');
</style>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="overflow-x-hidden">
        {{ $slot }}
    </body>

</html>
