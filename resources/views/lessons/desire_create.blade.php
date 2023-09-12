    <x-app-layout>
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <!--説明-->
                <div class="mb-10 md:mb-16">
                    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">来月のお稽古希望時間</h2>
                        <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">来月のお稽古日程のうち、参加できる日の空いている時間を選択して登録してください。</p>
                </div>    
                <!--希望時間投稿フォーム-->
                <form action="{{route('desireStore')}}" method="POST" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
                    @csrf
                    
                    <div>
                        <label for="desire" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">日付</label>
                        <select name="desire[schedule_id]">
                            <option value="" style="display: none;">選択してください</option>
                                @foreach($attendances as $attendance)
                                    <option value={{$attendance->id}}>{{$attendance->start_date->format('Y/m/d')}}<br>
                                @endforeach
                        </select>
                        <p class="schedule_id__error" style="color:darkred">{{ $errors->first('desire.schedule_id') }}</p>
                    </div>
                    <div>
                    <label for="desire">何時から</label>
                    <select id="desire" name="desire[start_time]">
                        <option value="" style="display: none;">選択してください</option>
                        <option value="9:00:00">9:00</option>
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
                    <div class="end_time">
                    <label for="desire">何時まで</label>
                    <select name="desire[end_time]">
                        <option value="" style="display: none;">選択してください</option>
                        <option value="10:30:00">10:30</option>
                        <option value="12:10:00">12:10</option>
                        <option value="13:10:00">13:10</option>
                        <option value="14:50:00">14:50</option>
                        <option value="16:30:00">16:30</option>
                        <option value="19:00:00">19:00</option>
                        <option value="20:00:00">20:00</option>
                    </select>
                    </div>
                    <p class="end_time__error" style="color:darkred">{{ $errors->first('desire.end_time') }}</p>
                    <div class="remarks">
                    <label for="desire">備考</label>
                    <textarea name="desire[remarks]">{{ old('desire.remarks') }}</textarea>
                    <p class="remarks__error" style="color:darkred">{{ $errors->first('desire.remarks') }}</p>
                    </div>
                    <input type="submit" value="確定"/>
                </form>
                
                <h1>今月の出欠<h1>
                @foreach($absences as $absence)
                <form action="{{route('absenceDelete')}}" id="form_{{ $absence->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="checkbox" name="absence[id]" onclick="deleteAbsence({{ $absence->id }})" value={{ $absence->id }}>{{$absence->start_date->format('Y/m/d')}}</input>
                </form>
                @endforeach


            <div class="footer">
            <a href="/desire">戻る</a>
            </div>
            <script>
                function deleteAbsence(id) {
                    'use strict'
                    
                    if(confirm('お稽古をお休みしましたか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
    </x-app-layout>
