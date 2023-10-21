<x-app-layout>
    <div class="m-5">
        <a href="/admin" class="font-semibold text-gray-600 hover:underline">Admin</a>
        ＞
        <a href="/admin/desire" class="font-semibold text-gray-600 hover:underline">部員の希望時間</a>
        ＞
        <a href="/admin/desire/plan" class="text-indigo-600 hover:underline font-semibold">お稽古順案</a>
        <h2 id="allTimeTable" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
            <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">お稽古順案作成</span>
        </h2>
        <div class="mt-10 flex justify-center">
            <form method="POST" action="{{ route('planCreate') }}">
                @csrf
                @foreach($attendances as $attendance)
                    <button name="sentence" value="{{ $attendance->id }}">{{ $attendance->start_date->format('m/d') }}</button>
                @endforeach
            </form>
        </div>
            {{ isset($chat_response) ? $chat_response : '' }}
        <a href="#" class="back-to-top js-to-top">TOP</a>
    </div>
</x-app-layout>