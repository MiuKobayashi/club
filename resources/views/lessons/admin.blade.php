<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>管理者画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <x-app-layout>
        <x-slot name="header">
            管理者画面
        </x-slot>
        <body>
            <h1>今月の活動予定</h1>
            <script>
                const isAdmin = {{auth()->user()->admin}};
            </script>
            <div id='calendar'></div>
            <script src="{{ asset('js/calendar.js') }}"></script>
            
        </body>
    </x-app-layout>
</html>