<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>編集</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<x-app-layout>
        <body>
        <form action="{{route('store')}}" method="POST">
            @csrf
            <h3>曲名</h3>
                <select name="progress[song_id]" id="songs">
                    <option value="" style="display: none;">選択してください</option>
                    </option>
                        @foreach($performances as $performance)
                            <option value="{{ $performance->id }}">{{ $performance->name }}</option>
                        @endforeach
                </select>
            <h3>パート</h3>
                <select name="progress[part_id]" id="parts">
                    <option value="" style="display: none;">選択してください</option>
                        @foreach($parts as $part)
                                <option value="{{ $part->id }}">{{ $part->name }}</option>
                        @endforeach
                </select>
            <br>
                <input type="submit" value="登録"/><br>
        </form>
        <div class="footer">
            <a href="/progress">戻る</a>
        </div>
    </body>
    <script>
    </script>
    </x-app-layout>
</html>