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
            <div id='calendar'></div>
            <h1>月の予定/お稽古時間の予定</h1>
            <h1>今月のお稽古代</h1>
            <h2>今月の{{ Auth::user()->name }}さんのお稽古代</h2>
            <p>1000×4=4000円</p>
            <h1>今月の出欠<h1>
        </body>
    </x-app-layout>
</html>