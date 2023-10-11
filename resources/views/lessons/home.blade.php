<x-app-layout>
    <div class="m-5">
        <!--<a href="#announce">お知らせ</a>｜-->
        <!--<a href="#amount">お稽古代</a>｜-->
        <!--<a href="#schedule">今月の活動予定</a>-->
        <div class="mb-10 md:mb-16">
            <h2 id="announce" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
                <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">お知らせ</span>
            </h2>
            <div class="mt-10 flex justify-center">
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
            </div>
            <div>{{ $announcements->links('vendor.pagination.tailwind2') }}</div>
        </div>
        <div class="mb-10 md:mb-16">
            <h2 id="amount" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
                <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">今月の{{ Auth::user()->name }}さんのお稽古代</span>
            </h2>
            <div class="my-20 flex justify-center">
                <div class="bg-red-300 text-4xl text-center font-bold text-brown-700 border-4 border-dashed border-pink-800 w-3/5">1000円×{{$attendances}}回=<span class="text-brown-800">{{$amount}}円</span></div>
            </div>
        </div>
        <div class="mb-10 md:mb-16">
            <h2 id="schedule" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
                <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">今月の活動予定</span>
            </h2>
            <div class="mt-10 flex justify-center">
                <button id="myLessons" class="m-2.5 inline-block rounded-lg border-2 border-transparent bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-900 transition duration-100 hover:bg-pink-700 focus:border-red-50 focus:bg-pink-700 focus-visible:ring md:text-base">自分の予定</button>
                <button id="allLessons" class="m-2.5 inline-block rounded-lg border-2 border-transparent bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-900 transition duration-100 hover:bg-pink-700 focus:border-red-50 focus:bg-pink-700 focus-visible:ring md:text-base">部員の予定</button>
            </div>
            <script>
                let isAdmin = @json(auth()->user()->admin);
                let Duration = '00:30:00';
                let memberNames = @json($memberNames);
            </script>
            <script type="module" src="{{ asset('/js/calendar.js') }}"></script>
            <div class="flex justify-center">
                <div id='calendar' class="m-5 p-5 bg-white md:w-9/12 w-fit min-w-10 border-2 border-opacity-50 border-pink-900 rounded-lg"></div>
            </div>
        </div>
        <a href="#" class="back-to-top js-to-top">TOP</a>
    </div>
</x-app-layout>