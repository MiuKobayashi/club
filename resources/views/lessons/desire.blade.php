<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Desired Time</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .changeColor {
                background-color: mistyrose;
            }
        </style>
    </head>
    <x-app-layout>
        <x-slot name="header">
            提出内容画面
        </x-slot>
        <body>
            <h1>申請内容</h1>
                <table>
                    <tr>
                        <th>日付</th>
                        @for ($i = 0; $i < 8; $i++)
                            <th>{{ $Time[$i] }}</th>
                        @endfor
                    </tr>
                    @foreach($attendances as $attendance)
                        <tr>
                            <th>{{ $attendance->start_date->format('Y/m/d') }}</th>
                                @for ($i =0; $i < 8; $i++)
                                    <td id="td{{$attendance->id}}_{{$i}}"></td>
                                @endfor
                                @foreach ($attendance->desires as $Times)
                                    @for ($i = 0; $i < 8; $i++)
                                        @if($startTime[$i] >= $Times->start_time && $endTime[$i] <= $Times->end_time)
                                        <script>
                                            document.getElementById('td{{$attendance->id}}_{{$i}}').classList.add("changeColor");
                                        </script>
                                        @endif
                                    @endfor
                                @endforeach
                            </tr>
                    @endforeach
                </table>
                <a href='/desire/create'>申請はこちら</a>
                </div>
                <br>
        </body>
    </x-app-layout>
</html>