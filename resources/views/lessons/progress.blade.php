<x-app-layout>
    <h1 class='title'>練習中の曲</h1>
        <table border=1>
            <tr>
                <th>名前</th>
                <th>曲名</th>
                <th>パート</th>
            </tr>
                
            @foreach($practices as $practice)
                <tr>
                    <td>{{ $practice->name }}</td>
                    @foreach($practice->practicesongs as $practicesongs)
                        <td>{{ $practicesongs->song->name }}</td>
                        <td>{{ $practicesongs->part->name }}</td>
                    @endforeach

                </tr>
            @endforeach
            </table>
            <br>
            <form action="{{route('done')}}" method="POST">
            @csrf
            <button name="progress[inprogress]" onClick="return confirm('お稽古が終了しましたか？');">完了</button>
            </form>
            <br>
            <a href='/progress/create'>登録はこちら</a>
            <br>
            <br>
            
            <br>
            <h1 class='title'>本番の曲</h1>
            <table border=1>
                <tr>
                    <th>曲名</th>
                    <th>パート</th>
                    <th>名前</th>
                </tr>

                    @foreach($performances as $performance)
                        <tr>    
                            <th rowspan={{ $performance->parts_count }}> {{ $performance->name }} </th>
                            @foreach($performance->parts as $part)
                            <td>{{ $part->name }}</td>
                                @foreach($performance->practicesongs as $user)
                                    @if($user->part_id==$part->id)
                                        <td>{{ $user->user->name }}</td>
                                    @endif
                                @endforeach
                            </tr>
                            @endforeach
                    @endforeach
            </table>
</x-app-layout>
