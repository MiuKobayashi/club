<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PracticeSong;
use App\Models\Song;


class UserController extends Controller
{
    public function progress(User $user) 
    {
        //練習中の曲
        $practice = User::with(['songs','practicesongs'=> function ($query) {
            $query->where('inprogress',1);
        }])->get();

        //曲データ
        $song = Song::with(['users','practicesongs.part','parts'
        ])->get();
        

        return view('lessons.progress')->with([
            'practices' => $practice,
            'performances' => $performance,
            'songs' => $song]);
    }
    
    public function getUser()
    {
        $admin = Auth::user()->admin;

    }
}
