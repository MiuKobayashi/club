<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\SongPartRequest;
use App\Http\Requests\NewSongRequest;
use App\Http\Requests\NewPracticeRequest;
use App\Models\Song;
use App\Models\PracticeSong;
use App\Models\User;
use App\Models\Part;

class PracticeSongController extends Controller
{
    //お稽古で練習中の曲の登録
    public function progressCreateStore(SongPartRequest $request, PracticeSong $practicesong)
    {
        //現在練習中となっている曲をすべて練習中ではない登録
        $practicesong->notInProgress();
                       
        //練習中の登録  
        $input = $request['progress'];
        $practicesong->fill($input);
        $practicesong
        ->where([
            ['user_id', auth()->id()],
            ['song_id', $input["song_id"]],
            ['part_id', $input["part_id"]]
        ])
        ->update([
            'inprogress' => 1
        ]);
        return redirect('/progress');
    }
    
    //お稽古で練習中の曲の完了
    public function progressDone(PracticeSong $practicesong)
    {   
        $practicesong->notInProgress();
        return redirect('/progress');
    }
    
    public function progressSongCreateView(Request $request, User $user, Song $song, Part $part)
    {
        //部員
        $users = $user->getMembers();

        //本番の曲
        $performance = $song->selectPerformance()
                            ->get();
        
        // 検索ワードを取得
        $searchQuery = $request->input('word', '');
        $kotoSearchQuery = null;
        if(!empty($searchQuery)) {
            $kotoSearchQuery = $searchQuery . " 箏";
        }
        $apiKey = config('services.youtube.api_key');

        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'q' => $kotoSearchQuery,
            'key' => $apiKey,
            'part' => 'snippet',
            'type' => 'video',
        ]);

        $data = $response->json();
        
        $topThreeVideos = [];
        if (isset($data['items'])) {
            $topThreeVideos = array_slice($data['items'], 0, 3);
        }

        return view('lessons.song_store')->with([
            'parts' => $part->get(),
            'users' => $users,
            'performances' => $performance,
            'videos' => $topThreeVideos,
            'searchQuery' => $searchQuery]);
    }
    
    public function progressSongCreateStore(NewSongRequest $request, Song $song)
    {
        // 曲名を保存
        $input_song = $request->input('newSong');
        $song->fill($input_song);
        $song->performance = 1;
        $song->save();
        
        // 選択されたパートを中間テーブルに保存
        $input_parts = $request->input('newPart.id', []);
        $song->parts()->attach($input_parts);
        
        return redirect('/progress/song');
    }
    
    public function progressSongPracticeStore(NewPracticeRequest $request, PracticeSong $practicesong)
    {
        // 曲名を保存
        $input_practicesong = $request->input('newPractice');
        $practicesong->fill($input_practicesong);
        $practicesong->inprogress = 0;
        $practicesong->save();

        return redirect('/progress/song');
    }
}
