<x-app-layout>
    <div class="m-5">
        <div class="mb-10 md:mb-16">
            <h2 id="myTime" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
                <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">申請内容</span>
            </h2>
            <p class="mx-auto mt-10 max-w-screen-md text-center text-gray-500 md:text-lg">申請した希望時間は、表に色がつきます。</p>
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
                            <th class="text-center">備考</th>
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
        </div>
        <div class="mb-10 md:mb-16">
            <h2 id="allTime" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
                <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">部員の申請内容</span>
            </h2>
            <p class="mx-auto mt-10 max-w-screen-md text-center text-gray-500 md:text-lg">部員がすでに申請した希望時間では、表に色がつきます。</p>
            <div class="flex justify-center">
                @if($allAttendances->isEmpty())
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
        </div>
        <div class="mt-5 flex justify-end text-indigo-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
            </svg>
            <a href="/desire/create" class="font-semibold hover:underline">希望時間の申請はこちら</a>
        </div>
        <div class="mb-10 md:mb-16">
            <h2 id="thisMonthAbsence" class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">今月の出欠</h2>
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
                        <label class="cursor-pointer"><input type="checkbox" name="absence[id]" onchange="deleteAbsence({{ $absence->id }})" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-red-300 cursor-pointer" value={{ $absence->id }}>{{$absence->start_date->format('Y/m/d')}}</label>
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
