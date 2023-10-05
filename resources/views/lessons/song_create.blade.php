<x-app-layout>
    <div class="py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <a href="/progress" class="font-semibold hover:underline">Progress</a>
            ＞
            <a href="/progress/create" class="text-indigo-600 hover:underline font-semibold">進捗状況の登録</a>
            <!--説明-->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">曲・パートの登録</h2>
                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">お稽古で練習している曲とパートを登録してください。</p>
            </div>    
            <form action="{{route('songStore')}}" method="POST" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
                @csrf
                <div>
                    <label for="song" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*曲名</label>
                    
                    <select id="song" name="progress[song_id]" class="mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" style="display: none;">選択してください</option>
                            @foreach($practices as $practice)
                                <option value="{{ $practice->song->id }}">{{ $practice->song->name }}</option>
                            @endforeach
                    </select>
                    <p class="song__error" style="color:darkred">{{ $errors->first('progress.song_id') }}</p>
                </div>
                <div>
                    <label for="part" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*パート</label>
                    <select id="part" name="progress[part_id]" class="mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" style="display: none;">選択してください</option>
                    </select>
                    <p class="part__error" style="color:darkred">{{ $errors->first('progress.part_id') }}</p>
                </div>
                <div class="flex items-center justify-between sm:col-span-2">
                    <button type="submit" class="inline-block rounded-lg bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-700 transition duration-100 hover:bg-pink-700 focus-visible:ring active:bg-pink-700 md:text-base">登録</button>
                    <span class="text-sm text-gray-500">*Required</span>
                </div>
            </form>
            <div class="mx-10 mt-5 flex justify-end hover:underline text-indigo-600 font-semibold ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg>
                <a href="/progress">戻る</a>
            </div>
        </div>
    </div>
    <script>
        // ページが読み込まれた後に実行されるコード
        document.addEventListener("DOMContentLoaded", function () {
            // セレクトボックスの要素を取得
            const songSelect = document.getElementById("song");
            const partSelect = document.getElementById("part");
    
            // セレクトボックスが変更されたときに呼び出される関数
            songSelect.addEventListener("change", function () {
                // 選択された曲のidを取得
                const selectedSongId = songSelect.value;
        
                // パートのセレクトボックスをクリア
                partSelect.innerHTML = "";
        
                // 選択された曲に関連するパートを取得して追加
                @foreach($practices as $practice)
                    if ("{{ $practice->song->id }}" === selectedSongId) {
                        const option = document.createElement("option");
                        option.value = "{{ $practice->part->id }}";
                        option.textContent = "{{ $practice->part->name }}";
                        partSelect.appendChild(option);
                    }
                @endforeach
            });
        });
    </script>
</x-app-layout>
