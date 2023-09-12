<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function announcement(Announcement $announcement)
    {
        return view('lessons.home')->with(['announcements' => $announcement->getPaginateByLimit()]);
    }
    
    public function create()
    {
        return view('lessons.announcement_create');
    }
    
    public function store(AnnouncementRequest $request, Announcement $announcement)
    {
        $input = $request['announcement'];
        $announcement->fill($input)->save();
        return redirect('/admin');
    }
}
