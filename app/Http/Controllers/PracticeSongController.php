<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\PracticeSong;
use App\Models\User;
use App\Models\Part;

class PracticeSongController extends Controller
{
     public function create()
    {
        return view('lessons.create');
    }
    
     public function store(Request $request, PracticeSong $practicesong)
    {
        $input = $request['progress'];
        $practicesong->fill($input);
        $practicesong->user_id = auth()->id();
        $practicesong->inprogress = 1;
        $practicesong->save();
        return redirect('/progress');
    }
    
    public function check(request $request, PracticeSong $practicesong)
    {
        $input = $request['progress'];
        $practicesong->inprogress = $input["inprogress"];
        $practicesong->user_id = auth()->id();
        return redirect('/progress');
    }
    

}
