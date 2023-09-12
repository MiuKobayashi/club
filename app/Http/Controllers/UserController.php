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
    
    public function name(User $user)
    {
        $user = User::get();
        $startTime = [date('09:00:00'), date('10:40:00'), date('12:20:00'), date('13:20:00'), date('15:00:00'), date('16:40:00'), date('18:20:00'), date('19:00:00')];
        $endTime = [date('10:30:00'), date('12:10:00'), date('13:10:00'), date('14:50:00'), date('16:30:00'), date('18:10:00'), date('19:00:00'), date('20:00:00')];

        return view('lessons.admin')->with([
            'users' => $user,
            'startTime' => $startTime,
            'endTime' => $endTime]);
    }
}
