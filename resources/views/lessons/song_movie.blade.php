<x-app-layout>
    <div class="m-5">
        <div class="flex items-center mb-4">
            <a href="/progress" class="font-semibold text-gray-600 hover:underline">Progress</a>
            <span class="mx-2 text-gray-600">＞</span>
            <a href="/progress/movie" class="text-indigo-600 hover:underline font-semibold">動画一覧</a>
        </div>
        <h2 class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
            <span class="bg-red-100 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">曲目の動画一覧</span>
        </h2>
        <p class="mx-auto mt-2 max-w-screen-md text-center text-gray-500 md:text-lg flex justify-center">本番で演奏する曲目の動画です。練習の参考にしてください。</p>
        <div class="flex flex-wrap justify-center mx-5 mt-10">
            
                @foreach($codes as $key => $code)
                    <div class="youtube">
                        <p class="text-lg mt-5">【{{ $performances[$key]->name }}】</p>
                        {!! $code !!}
                    </div>
                @endforeach
        </div>
        <div class="mx-10 mt-5 flex justify-end hover:underline text-indigo-600 font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
            <a href="/progress">戻る</a>
        </div>
        <a href="#" class="back-to-top js-to-top">TOP</a>
    </div>
</x-app-layout>