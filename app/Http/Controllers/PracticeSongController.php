<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PracticeSongRequest;
use App\Models\Song;
use App\Models\PracticeSong;
use App\Models\User;
use App\Models\Part;

class PracticeSongController extends Controller
{
     public function store(PracticeSongRequest $request, PracticeSong $practicesong)
    {
        $practicesong->where('user_id',auth()->id())
        ->update([
            'inprogress' => 0
            ]);
            
        $input = $request['progress'];
        $practicesong->fill($input);
        $practicesong
        ->where([
            ['user_id','=',auth()->id()],
            ['song_id', '=', $input["song_id"]]
        ])
        ->update([
            'inprogress' => 1
        ]);
        return redirect('/progress');
    }
    
    public function done(Request $request, PracticeSong $practicesong)
    {   
        $input = $request['progress'];
        $practicesong->fill($input);
        $practicesong->where('user_id',auth()->id())
        ->update([
            'inprogress' => 0
            ]);
        return redirect('/progress');
    }
    
    public function newSong()
    {
        $part = Part::get();
        $user = User::get();
        $performance = Song::where('performance',1)->with('parts')->get();

        
        return view('lessons.song_store')->with([
            'parts' => $part,
            'users' => $user,
            'performances' => $performance]);
    }
    
    public function newSongStore(PracticeSongRequest $request, Song $song)
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
    
    public function newPracticeStore(PracticeSongRequest $request, PracticeSong $practicesong)
    {
        // 曲名を保存
        $input_practicesong = $request->input('newPractice');
        $practicesong->fill($input_practicesong);
        $practicesong->inprogress = 0;
        $practicesong->save();

        return redirect('/progress/song');
    }
}
