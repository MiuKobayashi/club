<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function adminCreateView()
    {
        return view('lessons.announcement_create');
    }
    
    public function adminCreateStoretore(AnnouncementRequest $request, Announcement $announcement)
    {
        $input = $request['announcement'];
        $announcement->fill($input)->save();
        return redirect('/admin');
    }
    
    public function adminEditView(Announcement $announcement)
    {
        return view('lessons.announcement_edit')->with(['announcement' => $announcement]);
    }
    
    public function adminUpdate(AnnouncementRequest $request, Announcement $announcement)
    {
        $input_announce = $request['announcement'];
        $announcement->fill($input_announce)->save();
        return redirect('/admin');
    }
    
    public function delete(Announcement $announcement)
    {
        $announcement->delete();
        return redirect('/admin');
    }
}
