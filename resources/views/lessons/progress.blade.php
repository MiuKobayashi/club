<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>進捗状況</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <x-app-layout>
        <x-slot name="header">
            進捗状況
        </x-slot>
        <body>
            <h1 class='title'>練習中の曲</h1>
            <table border=1>
                <tr>
                    <th>名前</th>
                    <th>曲名</th>
                    <th>パート</th>
                </tr>
                
                @foreach($practices as $practice)
                <tr>
                    <td><a href='/progress/create'>{{ $practice->name }}</a></td>
                    @foreach($practice->practicesongs as $practicesongs)
                        <td>{{ $practicesongs->song->name }}</td>
                        <td>{{ $practicesongs->part->name }}</td>
                    @endforeach

                </tr>
                @endforeach
            </table>
            <br>
            <br>
            
            <br>
            <h1 class='title'>本番の曲</h1>
            <table border=1>
                <tr>
                    <th>曲名</th>
                    <th>パート</th>
                    <th>名前</th>
                </tr>

                    @foreach($performances as $performance)
                <tr>
                        <td> {{ $performance->name }} </td>
                        @foreach($performance->parts as $part)
                            <td>{{ $part->name }}</td>
                        @endforeach
                        @foreach($performance->practicesongs as $user)
                            <td>{{ $user->user->name }}</td>
                        @endforeach
                </tr>
                    @endforeach
            </table>
                
        </body>
    </x-app-layout>
</html>