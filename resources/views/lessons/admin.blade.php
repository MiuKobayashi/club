<x-app-layout>
    <h1>今月の活動予定</h1>
        部員名：<select name="desire['user_id']" id='user_id'>
                    <option value="">選択してください</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                </select>
        <script>
            const isAdmin = {{auth()->user()->admin}};
            let Duration = '00:10:00';
        </script>
        <script src="{{ asset('js/calendar.js') }}"></script>
        <div id='calendar' class="m-10"></div>

            <h1>希望時間</h1>
            @foreach($attendances as $attendance)
            <h1>{{ $attendance->start_date->format('Y/m/d') }}</h1>
            <table>
                    <tr>
                        <th>部員</th>
                        @for ($i = 0; $i < 8; $i++)
                            <th>{{ $Time[$i] }}</th>        
                        @endfor
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <th>{{ $user->name }}</th>
                        @for ($i = 0; $i < 8; $i++)
                            <td id="td{{$attendance->id}}_{{$user->id}}_{{$i}}"></td>    
                        @endfor
                        @foreach ($attendance->desires as $Times)
                            @if($Times->user_id == $user->id)
                                @for ($i = 0; $i < 8; $i++)
                                    @if($startTime[$i] >= $Times->start_time && $endTime[$i] <= $Times->end_time)
                                        <script>
                                            document.getElementById('td{{$attendance->id}}_{{$user->id}}_{{$i}}').classList.add("changeColor");
                                        </script>
                                    @endif
                                @endfor
                            @endif
                        @endforeach
                    </tr>
                    @endforeach
                </table>
                <br>
                @endforeach
                <a href='/admin/create'>お稽古登録・お知らせ投稿はこちら</a>
        </form>
    </x-app-layout>
