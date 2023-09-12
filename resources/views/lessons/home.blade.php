<x-app-layout>
    <h1>お知らせ</h1>
        <h1>今月の活動予定</h1>
        <ol>
            @foreach($announcements as $announcement)
                <li>{{ $announcement->created_at->format('Y/m/d') }} {{ $announcement->title }}</li>
                <li>{{ $announcement->description }}</li>
            @endforeach
        </ol>
        <div>{{ $announcements->links('vendor.pagination.tailwind2') }}</div>
            <script>
                const isAdmin = {{auth()->user()->admin}};
                let Duration = '00:30:00';
            </script>
            <script src="{{ asset('js/calendar.js') }}"></script>
            <div id='calendar' class="m-10"></div>
        <h1>今月のお稽古代</h1>
        <h2>今月の{{ Auth::user()->name }}さんのお稽古代</h2>
            <p>1000円×{{$attendances}}回={{$amount}}円</p>
</x-app-layout>