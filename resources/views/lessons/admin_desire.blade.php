<x-app-layout>
    <div class="m-5">
        <a href="/admin" class="font-semibold text-gray-600 hover:underline">Admin</a>
        ＞
        <a href="/admin/desire" class="text-indigo-600 hover:underline font-semibold">お稽古順作成</a>
        <h2 id="allTimeTable" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
            <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">希望時間</span>
        </h2>
        <div class="mt-10 flex justify-center">
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
        <div class="mt-5 flex justify-end text-indigo-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-indigo-100">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
            </svg>
            <a href="/admin/desire/plan" class="font-semibold hover:underline bg-indigo-100">お稽古順案作成はこちら</a>
        </div>
        <a href="#" class="back-to-top js-to-top">TOP</a>
    </div>
</x-app-layout>