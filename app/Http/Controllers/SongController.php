<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\PracticeSong;
use App\Models\User;
use App\Models\Part;

class SongController extends Controller
{
    public function progress(Song $song)
    {
        //練習中の曲
        $practice = User::with(['practicesongs'=> function ($query) {
            $query->where('inprogress',1)->with(['song','part']);
        }])->get();

        //本番の曲
        $performance = Song::where('performance',1)->with(['parts','practicesongs.user'])
        ->withcount('parts')->get();
        
        return view('lessons.progress')->with([
            'practices' => $practice,
            'performances'=>$performance
            ]);
    }
    
    public function songs(Song $song)
    {
        //練習中の曲
        $practice = PracticeSong::where('user_id', auth()->user()->id)
        ->where('inprogress', false)
        ->whereHas('song', function ($query) {
            $query->where('performance', true);
        })->with('song')->get();
        

        return view('lessons.song_create')->with([
            'practices' => $practice,
        ]);
    }
    
    public function store()
    {
        $parts = Part::get();
        $users = User::get();
        $performance = Song::where('performance', true)->with('parts')->get();
        

        return view('lessons.song_store')->with([
            'parts' => $parts,
            'users' => $users,
            'performances' => $performance
        ]);
    }
    
    public function newSong(Request $request, Song $song, Part $part)
    {
        //songテーブルに保存する
        $input_song = $request->input('newSong');
        $song->fill($input_song);
        $song->performance = 1;
        $song->save();
        
        //partテーブルに保存する
        $input_parts = $request->input('newPart.id',[]);
        $song->parts()->attach($input_parts);   
        
        return redirect('/progress/store');
    }
    
    public function newPractice(Request $request, PracticeSong $practicesong)
    {
        $input_practicesong = $request['newPractice'];
        $practicesong->fill($input_practicesong);
        $practicesong->inprogress = 0;
        $practicesong->save();

        return redirect('/progress/store');
    }

}

