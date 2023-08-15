<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>編集</title>
    </head>
    <body>
        <form action="/progress" method="POST">
            @csrf
            <h3>曲名</h3>
                <select name="progress[song_id]">
                    <option value="">選択してください</option>
                    @foreach($performances as $performance)
                        <option value="{{ $performance->id }}">{{ $performance->name }}</option>
                    @endforeach
                </select>
            <h3>パート</h3>
                <select name="progress[part_id]">
                    <option value="">選択してください</option>
                    @foreach($performances as $performance)
                        @foreach($performance->parts as $part)
                            <option value="{{ $part->id }}">{{ $part->name }}</option>
                        @endforeach
                    @endforeach
                </select><br>
            <input type="submit" value="store"/><br>
            <h3>お稽古進捗</h3>
                現在お稽古中の曲：
                
                <button type="button" name="progress[inprogress]" value=0 onclick="clickConfirm()">完了</button>
        </form>
        <div class="footer">
            <a href="/progress">戻る</a>
        </div>
    </body>
    <script>
        function clickConfirm() {
        if(confirm("お稽古が終了しましたか？")){
            document.getElementById("progress[inprogress]").value
        }
    }
    </script>
</html>