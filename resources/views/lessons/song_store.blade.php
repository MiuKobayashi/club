<x-app-layout>
    <div class="py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <a href="/progress" class="font-semibold text-gray-600 hover:underline">Progress</a>
            ＞
            <a href="/progress/newsong" class="text-indigo-600 hover:underline font-semibold">曲目の登録</a>
            <!--説明-->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">曲・パートの登録</h2>
                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">新しい曲とパートを登録してください。</p>
            </div>    
            <form action="{{ route('newSongStore') }}" method="POST" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
                @csrf
                <div>
                    <label for="newSongName" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*曲名</label>
                    <input type="text" name="newSong[name]" placeholder="曲名" class="w-full rounded border border-gray-300 bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" value="{{ old('newSong.name' )}}"/>
                    <p class="newSong__error" style="color: darkred">{{ $errors->first('newSong.name') }}</p>
                </div>
                <div>
                    <label for="newSongPart" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*パート</label>
                    <div>
                        @foreach($parts as $part)
                            <label class="block"><input type="checkbox" name="newPart[id][]" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-red-300" value="{{ $part->id }}">{{$part->name}}</label>
                        @endforeach
                        <p class="part__error" style="color: darkred">{{ $errors->first('newPart.id') }}</p>
                    </div>
                </div>
                <div class="flex items-center justify-end sm:col-span-2">
                    <button type="submit" class="inline-block rounded-lg bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-700 transition duration-100 hover:bg-pink-700 focus-visible:ring active:bg-pink-700 md:text-base">登録</button>
                </div>
            </form>

            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">部員の曲・パートの登録</h2>
            </div>    
            <form action="{{ route('newPracticeStore') }}" method="POST" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
                @csrf
                <div>
                    <label for="newPractice" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*部員</label>
                    <select name="newPractice[user_id]" class="mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">選択してください</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <p class="newSong__error" style="color:darkred">{{ $errors->first('newSong.name') }}</p>
                </div>
                <div>
                    <label for="newSongName" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*曲名</label>
                    <select id="newPracticeSong" name="newPractice[song_id]" id="newSong" class="mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">選択してください</option>
                        @foreach($performances as $performance)
                            <option value="{{ $performance->id }}">{{ $performance->name }}</option>
                        @endforeach
                    </select>
                    <p class="newSong__error" style="color:darkred">{{ $errors->first('newSong.name') }}</p>
                </div>
                <div>
                    <label for="newSongPart" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*パート</label>
                    <select id="newPracticePart" name="newPractice[part_id]" id="newPart" class="mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" style="display: none;">選択してください</option>
                    </select>
                    <p class="part__error" style="color:darkred">{{ $errors->first('newPart.name') }}</p>
                </div>
                <div class="flex items-center justify-end sm:col-span-2">
                    <button type="submit" class="inline-block rounded-lg bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-700 transition duration-100 hover:bg-pink-700 focus-visible:ring active:bg-pink-700 md:text-base">登録</button>
                </div>
                    <span class="text-sm text-gray-500">*Required</span>
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
            const newPracticeSongSelect = document.getElementById("newPracticeSong");
            const newPracticePartSelect = document.getElementById("newPracticePart");
    
            // セレクトボックスが変更されたときに呼び出される関数
            newPracticeSongSelect.addEventListener("change", function () {
                // 選択された曲のidを取得
                const selectedNewPracticeSongId = newPracticeSongSelect.value;
    
                // パートのセレクトボックスをクリア
                newPracticePartSelect.innerHTML = "<option value='' style='display: none;'>選択してください</option>";
    
                // 選択された曲に関連するすべてのパートを取得して追加
                @foreach($performances as $performance)
                    if ("{{ $performance->id }}" === selectedNewPracticeSongId) {
                        @foreach($performance->parts as $part)
                            // 新しい変数名を使用
                            const optionFor{{$part->id}} = document.createElement("option");
                            optionFor{{$part->id}}.value = "{{ $part->id }}";
                            optionFor{{$part->id}}.textContent = "{{ $part->name }}";
                            newPracticePartSelect.appendChild(optionFor{{$part->id}});
                        @endforeach
                    }
                @endforeach
            });
    
            // 初期状態で連動を行うために、ページ読み込み時に一度changeイベントを発生させる
            newPracticeSongSelect.dispatchEvent(new Event("change"));
        });
    </script>
</x-app-layout>
