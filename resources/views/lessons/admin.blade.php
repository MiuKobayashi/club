<x-app-layout>
    <div class="m-5">
        <h2 id="announceCreate" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
            <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">お知らせの登録・編集・削除</span>
        </h2>
        <div class="mt-10 flex justify-center">
            @if($announcements->isEmpty())
                <p class="font-semibold">お知らせはありません。</p>
            @else
                <ol class="w-full border-2 p-3 border-pink-800">
                    @foreach($announcements as $announcement)
                        <li class="font-semibold text-sm text-gray-800">{{ $announcement->updated_at->format('Y/m/d') }} {{ $announcement->title }}</li>
                        <li class="flex items-center">
                            <div>{{ $announcement->description }}</div>
                            <form action="/admin/{{ $announcement->id }}" id="form_{{ $announcement->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deleteAnnounce({{ $announcement->id }})" class="mr-2 px-2 py-1 bg-pink-900 text-white font-semibold rounded hover:bg-pink-700">Delete</button>
                            </form>
                            <a href="/admin/{{ $announcement->id }}/edit" class="px-2 py-1 text-red-900 border border-red-900 font-semibold rounded hover:bg-red-200">Edit</a>
                        </li>
                    @endforeach
                </ol>
            @endif
        </div>
        <div>{{ $announcements->links('vendor.pagination.tailwind2') }}</div>
        <div class="mt-5 flex justify-end text-indigo-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-indigo-100">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
            </svg>
            <a href="/admin/create" class="font-semibold hover:underline bg-indigo-100">お知らせ登録はこちら</a>
        </div>
        <h2 id="nextMonthCalendar" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
            <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">活動の登録</span>
        </h2>
        <div class="mt-10 flex justify-center">
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
                let memberNames = @json($memberNames);
            </script>
            <script type="module" src="{{ asset('/js/calendar.js') }}"></script>
            <div id='calendar' class="m-5 p-5 bg-white md:w-9/12 w-fit min-w-10 border-2 border-opacity-50 border-pink-900 rounded-lg"></div>
        </div>
        <div class="mt-5 flex justify-end text-indigo-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-indigo-100">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
            </svg>
            <a href="/admin/desire" class="font-semibold hover:underline bg-indigo-100">お稽古順作成はこちら</a>
        </div>
        <h2 id="memberList" class="mx-auto mt-10 text-center text-2xl font-bold text-pink-800">
            <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">部員名簿</span>
        </h2>
        <div class="mt-10 py-2 inline-block min-w-full sm:px-6 lg:px-8">
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
                                @if($user->practicesongs->isEmpty())
                                    <td class="bg-red-200 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">-</td>
                                    <td class="bg-red-200 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">-</td>
                                @else
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
                                @endif
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
    <a href="#" class="back-to-top js-to-top">TOP</a>
    <script>
        function deleteAnnounce(id) {
            'use strict'
            
            if (confirm('お知らせを削除しますか？')) {
                console.log(document.getElementById(`form_${id}`));
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>