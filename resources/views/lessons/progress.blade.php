<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>進捗状況</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            進捗状況
        </x-slot>
        <body>
            <h1>練習中の曲</h1>
            
            <h1>本番の曲</h1>
        </body>
    </x-app-layout>
</html>