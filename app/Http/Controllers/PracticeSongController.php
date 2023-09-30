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
            ['user_id', '=',auth()->id()],
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
}
