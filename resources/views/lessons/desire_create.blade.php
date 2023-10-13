<x-app-layout>
    <div class="bg-red-50 py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <a href="/desire" class="font-semibold text-gray-600 hover:underline">Desire</a>
            ＞
            <a href="/desire/create" class="text-indigo-600 hover:underline font-semibold">希望時間の申請</a>

            <!--説明-->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">来月のお稽古希望時間</h2>
                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">来月のお稽古日程のうち、参加できる日の空いている時間を選択して登録してください。</p>
            </div>    
            <!--希望時間投稿フォーム-->
            <form action="{{route('desireStore')}}" method="POST" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
                @csrf
                <!--登録する日にちを選択する-->
                <div class="sm:col-span-2">
                    <p><label for="desire" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*日付</label></p>
                    @foreach($attendances as $attendance)
                        <input type="radio" id="schedule_id-1" name="desire[schedule_id]" value="{{$attendance->id}}" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-red-300">
                        <label for="schedule_id-1">{{$attendance->start_date->format('Y/m/d')}}</label>
                    @endforeach
                    <p class="schedule_id__error" style="color:darkred">{{ $errors->first('desire.schedule_id') }}</p>
                </div>
                <!--開始時間を選択する-->
                <div>
                    <label for="desire" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*何時から</label>
                    <select id="desire_start" name="desire[start_time]" class="mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" style="display: none;">選択してください</option>
                        <option value="09:00:00">9:00</option>
                        <option value="10:40:00">10:40</option>
                        <option value="12:20:00">12:20</option>
                        <option value="13:20:00">13:20</option>
                        <option value="15:00:00">15:00</option>
                        <option value="16:40:00">16:40</option>
                        <option value="18:20:00">18:20</option>
                        <option value="19:00:00">19:00</option>
                    </select>
                    <p class="start_time__error" style="color:darkred">{{ $errors->first('desire.start_time') }}</p>
                </div>
                <!--終了時間を選択する-->
                <div>
                    <label for="desire" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*何時まで</label>
                    <select id="desire_end" name="desire[end_time]" class="mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" style="display: none;">選択してください</option>
                        <option value="10:30:00">10:30</option>
                        <option value="12:10:00">12:10</option>
                        <option value="13:10:00">13:10</option>
                        <option value="14:50:00">14:50</option>
                        <option value="16:30:00">16:30</option>
                        <option value="19:00:00">19:00</option>
                        <option value="20:00:00">20:00</option>
                    </select>
                    <p class="end_time__error" style="color:darkred">{{ $errors->first('desire.end_time') }}</p>
                </div>
                
                <!--備考を入力する-->
                <div class="sm:col-span-2">
                    <label for="desire" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">備考</label>
                    <textarea name="desire[remarks]" class="h-20 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">{{ old('desire.remarks') }}</textarea>
                    <p class="remarks__error" style="color:darkred">{{ $errors->first('desire.remarks') }}</p>
                </div>
                <!--送信ボタン-->
                <div class="flex items-center justify-between sm:col-span-2">
                    <button type="submit" class="inline-block rounded-lg bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-700 transition duration-100 hover:bg-pink-700 focus-visible:ring active:bg-pink-700 md:text-base">送信</button>
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
        document.addEventListener("DOMContentLoaded", function() {
            // desire_startセレクトボックスの要素を取得
            var startSelect = document.getElementById("desire_start");
            // desire_endセレクトボックスの要素を取得
            var endSelect = document.getElementById("desire_end");
    
            // desire_startセレクトボックスの選択肢が変更されたときのイベントハンドラを追加
            startSelect.addEventListener("change", function() {
                // 選択された開始時間を取得
                var selectedStartTime = startSelect.value;
                
                // desire_endセレクトボックスの選択肢をリセット
                endSelect.innerHTML = "";
                
                // "選択してください"オプションを追加
                var defaultOption = document.createElement("option");
                defaultOption.value = "";
                defaultOption.textContent = "選択してください";
                endSelect.appendChild(defaultOption);
    
                // 選択された開始時間よりも遅い時間のオプションを追加
                var endTimeOptions = [
                    "10:30:00", "12:10:00", "13:10:00", "14:50:00", "16:30:00", "19:00:00", "20:00:00"
                ];
    
                for (var i = 0; i < endTimeOptions.length; i++) {
                    if (endTimeOptions[i] > selectedStartTime) {
                        var option = document.createElement("option");
                        option.value = endTimeOptions[i];
                        // ここで表示する時間のフォーマットを調整できます
                        option.textContent = endTimeOptions[i].substring(0, 5); // 時間部分のみ表示
                        endSelect.appendChild(option);
                    }
                }
            });
        });
    </script>
</x-app-layout>
