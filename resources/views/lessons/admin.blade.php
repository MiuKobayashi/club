@php
    $buttons = [
        ['label' => '活動の登録', 'sectionId' => 'nextMonthCalendar'],
        ['label' => '希望時間', 'sectionId' => 'allTimeTable'],
        ['label' => '部員名簿', 'sectionId' => 'memberList'],
    ];
@endphp
<x-app-layout>
    <div class="bg-red-100 w-screen h-auto -mt-8 fixed t-24 z-50">
        <div class="ml-60">
            @foreach ($buttons as $button)
                |
                <button onclick="scrollToSection('{{$button['sectionId']}}')" class="text-gray-700 hover:underline">
                    {{ $button['label'] }}
                </button>
                |
            @endforeach
        </div>
    </div>
    <div class="m-5">
        <h2 id="nextMonthCalendar" class="mt-5 mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">活動の登録</h2>
        <div class="flex justify-center">
            <div class="mr-auto">
                <div class="sticky top-24">
                    <p class="font-semibold">部員名：</p>
                    <select name="desire['user_id']" id='user_id' class="w-10 mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">選択してください</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button id="myLessons" class="m-3 inline-block rounded-lg border-2 border-transparent bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-900 transition duration-100 hover:bg-pink-700 focus:border-red-50 focus:bg-pink-700 focus-visible:ring md:text-base">自分の予定</button>
                    <button id="allLessons" class="m-3 inline-block rounded-lg border-2 border-transparent bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-900 transition duration-100 hover:bg-pink-700 focus:border-red-50 focus:bg-pink-700 focus-visible:ring md:text-base">部員の予定</button>
                </div>
            </div>
            <script>
                let isAdmin = {{auth()->user()->admin}};
                let Duration = '00:10:00';
            </script>
            <script type="module" src="{{ asset('/js/calendar.js') }}"></script>
            <div id='calendar' class="m-5 p-5 bg-white md:w-9/12 w-fit min-w-10 border-2 border-opacity-50 border-pink-900 rounded-lg"></div>
        </div>
        <h1 id="allTimeTable" class="mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">希望時間</h1>
        <div class="flex justify-center">
            <div class="max-w-fit">
                @if($attendances->isEmpty())
                    <p class="font-semibold">申請された希望時間はありません。</p>
                @else
                    @foreach($attendances as $attendance)
                    <h1 class="mt-10 font-bold">{{ $attendance->start_date->format('Y/m/d') }}</h1>
                    <div class="m-2.5 flex justify-center">
                        <table class="flex justify-center">
                            <tr class="border-b-4 border-red-300">
                                <th class="border-r-4 border-red-300"></th>
                                @for ($i = 0; $i < 8; $i++)
                                    <th>{{ $Time[$i] }}</th>        
                                @endfor
                                <th>備考</th>
                            </tr>
                            @foreach($users as $user)
                            <tr>
                                <th class="border-r-4 border-red-300">{{ $user->name }}</th>
                                @for ($i = 0; $i < 8; $i++)
                                    <td id="td{{$attendance->id}}_{{$user->id}}_{{$i}}" class="border-r-2 border-dashed border-red-300"></td>    
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
                                        <td class="text-center">{{$Times->remarks}}</td>
                                    @endif
                                @endforeach
                            </tr>
                            @endforeach
                        </table>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <h1 id="memberList" class="mt-10 mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">部員名簿</h1>
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <table class="min-w-50 text-center border-separate">
                    <thead class="border-b-2">
                        <tr>
                            <th scope="col" rowspan=2 class="bg-red-400 text-sm font-semibold text-gray-900 px-6 py-4">学年</th>
                            <th scope="col" rowspan=2 class="bg-red-300 text-sm font-semibold text-gray-900 px-6 py-4">名前</th>
                            <th scope="col" colspan=2 class="bg-red-200 text-sm font-semibold text-gray-900 px-6 py-4">弾ける曲</th>
                            <th scope="col" rowspan=2 class="bg-red-100 text-sm font-semibold text-gray-900 px-6 py-4">経験</th>
                        </tr>
                        <tr>
                            <th scope="col" class="bg-red-200 text-sm font-semibold text-gray-900 px-6 py-4">曲</th>
                            <th scope="col" class="bg-red-200 text-sm font-semibold text-gray-900 px-6 py-4">パート</th>
                        </tr>
                            @foreach($users as $user)
                                <tr class="border-b-2 text-white">    
                                    <th class="bg-red-400 text-sm text-white font-semibold px-6 py-4 whitespace-nowrap">{{ $user->year }}</th>
                                    <th class="bg-red-300 text-sm text-white font-semibold px-6 py-4 whitespace-nowrap">{{ $user->name }}</th>
                                    <td class="bg-red-200 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                        @foreach($user->practicesongs as $practiceSong)
                                            {{ $practiceSong->song->name }}<br>
                                        @endforeach
                                    </td>
                                    <td class="bg-red-200 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                        @foreach($user->practicesongs as $practiceSong)
                                            {{ $practiceSong->part->name }}<br>
                                        @endforeach
                                    </td>
                                    <td class="bg-red-100 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                        @if ($user->experience)
                                            ◯
                                        @else
                                            ×
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                    </thread>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
