<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\PracticeSong;
use App\Models\User;
use App\Models\Part;

class SongController extends Controller
{
    public function progressView(Song $song)
    {
        //練習中の曲
        $practice = User::with(['practicesongs'=> function ($query) {
                        $query->where('inprogress',true)->with(['song','part']);
                        }])->get();

        //本番の曲
        $performance = $song->selectPerformance()
                            ->withcount('parts')
                            ->get();

        return view('lessons.progress')->with([
            'practices' => $practice,
            'performances'=>$performance
            ]);
    }
    
    public function progressCreateView(Song $song)
    {
        //練習していない曲
        $practice = PracticeSong::where('user_id', auth()->user()->id)
        ->where('inprogress', false)
        ->whereHas('song', function ($query) {
            $query->where('performance', true);
        })->with('song')->get();
        
        return view('lessons.song_create')->with([
            'practices' => $practice,
        ]);
    }
    
    public function progressMovieView(Song $song)
    {
        $performances = $song->selectPerformance()
                             ->whereNot('url', null)
                             ->get();
                             
        // YouTube動画のIDを抽出
        $videoIds = Song::getYouTubeVideoId();
        
        foreach($videoIds as $videoId)
        {
            $codes[] = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>';
        }
        
        return view('lessons.song_movie')->with([
            'performances' => $performances,
            'codes' => $codes
        ]);
    }
}

