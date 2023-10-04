<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
        .changeColor {
            background-color: rosybrown;
        }
        .fc .fc-timegrid-now-indicator-arrow {
            position: absolute;
            z-index: 4;
            margin-top: -10px;
            border-style: solid;
            border-left: 7px solid crimson;
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent;
        }
        .fc .fc-timegrid-now-indicator-line {
            opacity: .7;
            position: absolute;
            z-index: 4;
            left: 0;
            right: 0;
            margin-top: -2px;
            border-style: solid;
            border-color: crimson;
            border-width: 5px 0 0;
        }
        .fc-event {
            --fc-event-text-color: #58535E;
            font-weight: bold;
        }
        </style>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased m-0">
        <div class="w-screen min-h-screen bg-red-50 flex flex-col">
            @include('layouts.navigation')
        
            <!-- Page Content -->
            <div class="flex-1 h-full">
                {{ $slot }}
            </div>
        </div>
    <script>
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                const offset = section.getBoundingClientRect().top - 96;
                window.scrollTo({
                    top: offset,
                    behavior: 'smooth'
                });
            }
        }
    </script>
</body>
</html>