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
        $practice = User::with(['practicesongs'=> function ($query) {
            $query->where('inprogress',1)->with(['song','part']);
        }])->get();

        //本番の曲
        $performance = Song::where('performance',1)->with(['parts','practicesongs.user'])->get();
        $part = Part::with(['songs'=> function ($query) {
            $query->where('performance',1);
        }])->get();
        
        return view('lessons.song_create')->with([
            'practices' => $practice,
            'performances'=>$performance,
            'parts' => $part
        ]);
    }
}

