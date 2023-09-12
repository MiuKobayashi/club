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
            お知らせ登録画面
        </x-slot>
        <body>
            <h1>お知らせ</h1>
                <form action="/admin" method="POST">
                    @csrf
                    <div class="title">
                        <h2>タイトル</h2>
                        <input type="text" name="announcement[title]" placeholder="タイトル" value="{{ old('announcement.title' )}}"/>
                        <p class="title__error" style="color:darkred">{{ $errors->first('announcement.title') }}</p>
                    </div>
                    <div class="body">
                        <h2>説明</h2>
                        <textarea name="announcement[description]" placeholder="お稽古の希望時間を申請してください。">{{ old('announcement.description' )}}</textarea>
                        <p class="body__error" style="color:darkred">{{ $errors->first('announcement.description') }}</p>
                    </div>
                <input type="submit" value="登録"/>
                </form>
        </body>
    </x-app-layout>
</html>