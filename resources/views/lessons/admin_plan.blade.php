<x-app-layout>
    <div class="m-5">
        <a href="/admin" class="font-semibold text-gray-600 hover:underline">Admin</a>
        ＞
        <a href="/admin/desire/plan" class="text-indigo-600 hover:underline font-semibold">お稽古順案</a>
        <h2 id="allTimeTable" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
            <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">お稽古順案作成</span>
        </h2>
        <p class="mx-auto mt-5 max-w-screen-md text-center text-gray-500 md:text-lg">
            お稽古順案を作成したい日付のボタンをクリックすると、ChatGPTにより３パターンの案が作成され下に表示されます（作成には30秒程度かかります）。
        </p>
        <div class="mt-10">
            <form method="POST" action="{{ route('planCreate') }}" class="w-full flex justify-center">
                @csrf
                @foreach($attendances as $attendance)
                    <button id="date{{ $attendance->id }}" name="sentence" value="{{ $attendance->id }}" class="shadow-lg bg-pink-900 shadow-pink-900/50 hover:bg-pink-700 text-white text-2xl rounded px-2 py-1 m-1 w-1/5 flex items-center justify-center	">{{ $attendance->start_date->format('m/d') }}</button>
                    <script>
                        let button{{ $attendance->id }} = document.getElementById("date{{ $attendance->id }}");
                        button{{ $attendance->id }}.addEventListener("click", () => {
                            button{{ $attendance->id }}.innerHTML = `<div class="loading"></div>`;
                        });
                    </script>
                @endforeach
            </form>
        </div>
        
        <h2 class="mx-auto mt-10 text-center text-xl font-bold text-pink-800">
            <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-2xl">作成結果</span>
        </h2>
        @if(isset($chat_response))
        <div class="flex justify-center">
            <div class="mt-10 bg-white border-4 border-opacity-50 border-pink-900 radius p-10 w-1/2">
                @foreach($desireDates as $desireDate)
                    <p class="font-semibold">{{ $desireDate->start_date->format('m/d') }}のお稽古順案</p><br>
                @endforeach
                {!! nl2br(e($chat_response)) !!}
            </div>
        </div>
        @endif
        <a href="#" class="back-to-top js-to-top">TOP</a>
    </div>
</x-app-layout>