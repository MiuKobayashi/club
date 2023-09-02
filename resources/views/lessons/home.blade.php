<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <x-app-layout>
        <x-slot name="header">
            Home
        </x-slot>
        <body>
            <h1>お知らせ</h1>
            <h1>今月の活動予定</h1>
            <script>
                const isAdmin = {{auth()->user()->admin}};
            </script>
            <div id='calendar'></div>
            <script src="{{ asset('js/calendar.js') }}"></script>
            <h1>今月のお稽古代</h1>
            <h2>今月の{{ Auth::user()->name }}さんのお稽古代</h2>
            <p>1000×4=4000円</p>
            <h1>今月の出欠<h1>
                <form action="{{route('store')}}" method="POST">
                @foreach($attendances as $attendance)
                    <input type="checkbox" name="absent" value={{$attendance->start_date}}>{{$attendance->start_date}}<br>
                @endforeach
                <input type="submit" value="休み"/>
                </form>
        </body>
    </x-app-layout>
</html>