<x-app-layout>
    <div class="m-5">
    <h2 class="mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">申請内容</h2>
        <div class="flex justify-center">
            @if($attendances->isEmpty())
                <p class="font-semibold">申請された希望時間はありません。</p>
            @else
                <table class="w-full">
                    <tr class="border-b-4 border-red-300">
                        <th class="border-r-4 border-red-300"></th>
                        @for ($i = 0; $i < 8; $i++)
                            <th>{{ $Time[$i] }}</th>
                        @endfor
                        <th>備考</th>
                    </tr>
                    @foreach($attendances as $attendance)
                        <tr>
                            <th class="border-r-4 border-red-300">{{ $attendance->start_date->format('Y/m/d') }}</th>
                                @for ($i =0; $i < 8; $i++)
                                    <td id="my{{$attendance->id}}_{{$i}}" class="border-r-2 border-dashed border-red-300"></td>
                                @endfor
                                @foreach ($attendance->desires as $Times)
                                    @for ($i = 0; $i < 8; $i++)
                                        @if($startTime[$i] >= $Times->start_time && $endTime[$i] <= $Times->end_time)
                                        <script>
                                            document.getElementById('my{{$attendance->id}}_{{$i}}').classList.add("changeColor");
                                        </script>
                                        @endif
                                    @endfor
                                    <td>{{ $Times->remarks }}</td>
                                @endforeach
                            </tr>
                    @endforeach
                </table>
            @endif
        </div>
        
    <h2 class="mt-10 mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">申請状況</h2>
        <div class="flex justify-center">
            @if($attendances->isEmpty())
                <p class="font-semibold">申請された希望時間はありません。</p>
            @else
                <table class="w-full">
                    <tr class="border-b-4 border-red-300">
                        <th class="border-r-4 border-red-300"></th>
                        @for ($i = 0; $i < 8; $i++)
                            <th>{{ $Time[$i] }}</th>
                        @endfor
                    </tr>
                    @foreach($allAttendances as $allAttendance)
                        <tr>
                            <th class="border-r-4 border-red-300">{{ $allAttendance->start_date->format('Y/m/d') }}</th>
                                @for ($i =0; $i < 8; $i++)
                                    <td id="all{{$allAttendance->id}}_{{$i}}" class="border-r-2 border-dashed border-red-300"></td>
                                @endfor
                                @foreach ($allAttendance->desires as $Times)
                                    @for ($i = 0; $i < 8; $i++)
                                        @if($startTime[$i] >= $Times->start_time && $endTime[$i] <= $Times->end_time)
                                            <script>
                                                document.getElementById('all{{$allAttendance->id}}_{{$i}}').classList.add("changeColor");
                                            </script>
                                        @endif
                                    @endfor
                                @endforeach
                            </tr>
                    @endforeach
                </table>
            @endif
        </div>
        <div class="my-5 hover:underline flex justify-end">
            <a href='/desire/create'>申請はこちら</a>
        </div>
        <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">今月の出欠</h2>
            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">お稽古をお休みしたら、こちらのフォームから申請してください。</p>
        </div>    
        <div class="flex justify-center relative inline-block px-1 py-2">
            @if($absences->isEmpty())
                <p class="font-semibold">今月参加したお稽古はありません。</p>
            @else
                @foreach($absences as $absence)
                    <form action="{{route('absenceDelete')}}" id="form_{{ $absence->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <label><input type="checkbox" name="absence[id]" onchange="deleteAbsence({{ $absence->id }})" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-red-300" value={{ $absence->id }}>{{$absence->start_date->format('Y/m/d')}}</label>
                    </form>
                @endforeach
            @endif
        </div>

        <script>
            function deleteAbsence(id) {
                'use strict';
                const checkbox = document.getElementById(`form_${id}`).querySelector('input[type="checkbox"]');
    
                if (confirm('お稽古をお休みしましたか？')) {
                    document.getElementById(`form_${id}`).submit();
                } else {
                    checkbox.checked = false;
                }
            }
        </script>

    </div>
</x-app-layout>
