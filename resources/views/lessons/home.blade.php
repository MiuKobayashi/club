<x-app-layout>
    <div class="m-5">
        <h2 class="mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">お知らせ</h2>
            <div class="md:w-9/12 w-fit">
            <ol class="border-2 p-3 border-pink-800">
                @foreach($announcements as $announcement)
                    <li class="font-semibold text-sm text-gray-800">{{ $announcement->created_at->format('Y/m/d') }} {{ $announcement->title }}</li>
                    <li>{{ $announcement->description }}</li>
                @endforeach
            </ol>
            <div>{{ $announcements->links('vendor.pagination.tailwind2') }}</div>
            </div>
        <div class="my-20">
            <h2 class="mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">今月の{{ Auth::user()->name }}さんのお稽古代</h2>
                <div class="bg-red-200 text-4xl text-center font-bold text-brown-600 border-4 border-dashed border-red-300 w-fit">1000円×{{$attendances}}回={{$amount}}円</div>
        </div>
        <h2 class="mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">今月の活動予定</h2>
            <script>
                const isAdmin = {{auth()->user()->admin}};
                let Duration = '00:30:00';
            </script>
            <div >
            <button id="myLessons" class="inline-block rounded-lg border-2 border-transparent bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-900 transition duration-100 hover:bg-pink-700 focus:border-red-50 focus:bg-pink-700 focus-visible:ring md:text-base">自分の予定</button>
            <button id="allLessons" class="inline-block rounded-lg border-2 border-transparent bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-900 transition duration-100 hover:bg-pink-700 focus:border-red-50 focus:bg-pink-700 focus-visible:ring md:text-base">部員の予定</button>
            </div>
            <div id='calendar' class="m-5 bg-white md:w-9/12 w-fit min-w-10"></div>
    </div>
</x-app-layout>