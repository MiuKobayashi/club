<x-app-layout>
    <div class="m-5">
        <h1 class="mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">希望時間</h1>
        <div class="flex justify-center">
            <div class="max-w-fit">
                @if($attendances->isEmpty())
                    <p class="font-semibold">申請された希望時間はありません。</p>
                @else
                    @foreach($attendances as $attendance)
                    <h1 class="font-bold">{{ $attendance->start_date->format('Y/m/d') }}</h1>
                    <div class="m-2.5 flex justify-center">
                        <table class="flex justify-center">
                            <tr class="border-b-4 border-red-300">
                                <th class="border-r-4 border-red-300"></th>
                                @for ($i = 0; $i < 8; $i++)
                                    <th>{{ $Time[$i] }}</th>        
                                @endfor
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
        <h2 class="mt-5 mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">活動の登録</h2>
        <div class="flex justify-center">
            <div class="mr-auto">
                <div class="sticky top-24">
                    <p class="font-semibold">部員名：</p>
                    <select name="desire['user_id']" id='user_id' class="mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
            const isAdmin = {{auth()->user()->admin}};
            let Duration = '00:10:00';
        </script>
        <script src="{{ asset('/js/calendar.js') }}"></script>
        <div id='calendar' class="m-5 bg-white md:w-9/12 w-fit min-w-10 border-2 border-opacity-50 border-pink-900 rounded-lg"></div>
        </div>
            <a href='/admin/create' class="hover:underline">お稽古登録・お知らせ投稿はこちら</a>
        </form>
    </div>
</x-app-layout>
