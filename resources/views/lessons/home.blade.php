@php
    $buttons = [
        ['label' => 'お知らせ', 'sectionId' => 'announce'],
        ['label' => 'お稽古代', 'sectionId' => 'amount'],
        ['label' => '今月の活動予定', 'sectionId' => 'thisMonthCalendar'],
    ];
@endphp
<x-app-layout>
    <!--<div class="bg-red-100 w-screen h-auto sticky top-16 z-50">-->
    <!--    <div class="ml-60">-->
    <!--        @foreach ($buttons as $button)-->
    <!--            |-->
    <!--            <button onclick="scrollToSection('{{$button['sectionId']}}')" class="text-gray-700 hover:underline">-->
    <!--                {{ $button['label'] }}-->
    <!--            </button>-->
    <!--            |-->
    <!--        @endforeach-->
            <!--<a href="#announce">お知らせ</a>|-->
            <!--<a href="#amount">お稽古代</a>|-->
            <!--<a href="#thisMonthCalendar">今月の活動予定</a>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="m-5">
        <div class="mb-10 md:mb-16">
            <h2 id="announce" class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl text-pink-800 underline">お知らせ</h2>
            <div class="flex justify-center">
                @if($announcements->isEmpty())
                    <p class="font-semibold">お知らせはありません。</p>
                @else
                    <ol class="w-full border-2 p-3 border-pink-800">
                        @foreach($announcements as $announcement)
                            <li class="font-semibold text-sm text-gray-800">{{ $announcement->created_at->format('Y/m/d') }} {{ $announcement->title }}</li>
                            <li class="flex items-center">
                                <div>{{ $announcement->description }}</div>
                            </li>
                        @endforeach
                    </ol>
                @endif
                <div>{{ $announcements->links('vendor.pagination.tailwind2') }}</div>
            </div>
        </div>
        @if(Auth::user()->admin)
            <div class="flex justify-end text-indigo-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-indigo-100">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                </svg>
                <a href="/create" class="font-semibold hover:underline bg-indigo-100">お知らせ登録はこちら</a>
            </div>
        @endif
        <div class="mb-10 md:mb-16">
            <h2 id="amount" class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl text-pink-800 underline">今月の{{ Auth::user()->name }}さんのお稽古代</h2>
            <div class="my-20 flex justify-center">
                <div class="bg-red-200 text-4xl text-center font-bold text-brown-600 border-4 border-dashed border-red-300 w-3/5">1000円×{{$attendances}}回={{$amount}}円</div>
            </div>
        </div>
        <div class="mb-10 md:mb-16">
            <h2 id="thisMonthCalendar" class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl text-pink-800 underline">今月の活動予定</h2>
            <div class="flex justify-start">
                <button id="myLessons" class="m-2.5 inline-block rounded-lg border-2 border-transparent bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-900 transition duration-100 hover:bg-pink-700 focus:border-red-50 focus:bg-pink-700 focus-visible:ring md:text-base">自分の予定</button>
                <button id="allLessons" class="m-2.5 inline-block rounded-lg border-2 border-transparent bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-900 transition duration-100 hover:bg-pink-700 focus:border-red-50 focus:bg-pink-700 focus-visible:ring md:text-base">部員の予定</button>
            </div>
            <script>
                let isAdmin = @json(auth()->user()->admin);
                let Duration = '00:30:00';
            </script>
            <script type="module" src="{{ asset('/js/calendar.js') }}"></script>
            <div class="flex justify-center">
                <div id='calendar' class="m-5 p-5 bg-white md:w-9/12 w-fit min-w-10 border-2 border-opacity-50 border-pink-900 rounded-lg"></div>
            </div>
        </div>
    </div>
</x-app-layout>