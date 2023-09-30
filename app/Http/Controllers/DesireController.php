<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desire;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Song;
use Carbon\Carbon;

class DesireController extends Controller
{

    public function desire(Schedule $schedule)
    {
        //今月の活動日
        $Start = Carbon::now()->startOfMonth()->toDateString();
        $End = Carbon::now()->endOfMonth()->toDateString();
        
        //来月の活動日
        $StartMonth = Carbon::now()->startOfMonth()->addMonthNoOverflow()->toDateString();
        $EndMonth = Carbon::now()->endOfMonth()->addMonthNoOverflow()->toDateString();
        
        $absence = Schedule::whereBetween('start_date',[$Start,$End])
        ->where('event_name',"お稽古")
        ->where('user_id', auth()->user()->id )
        ->orderBy('start_date')
        ->get();

        $attendance = Schedule::whereBetween('start_date',[$StartMonth,$EndMonth])
        ->where('event_name',"お稽古")
        ->where('user_id', NULL)
        ->orderBy('start_date')
        ->with(['desires'=> function ($query) {
            $query->where('user_id', auth()->user()->id);
        }])->get();
        
        $allAttendance = Schedule::whereBetween('start_date',[$StartMonth,$EndMonth])
        ->where('event_name',"お稽古")
        ->where('user_id', NULL)
        ->orderBy('start_date')
        ->with('desires')->get();

        $startTime = [date('09:00:00'), date('10:40:00'), date('12:20:00'), date('13:20:00'), date('15:00:00'), date('16:40:00'), date('18:20:00'), date('19:00:00')];
        $endTime = [date('10:30:00'), date('12:10:00'), date('13:10:00'), date('14:50:00'), date('16:30:00'), date('18:10:00'), date('19:00:00'), date('20:00:00')];
        $Time = ['09:00-10:30','10:40-12:10','12:20-13:10','13:20-14:50','15:00-16:30','16:40-18:10','18:20-19:00','19:00-20:00'];
        return view('lessons.desire')->with([
            'absences' => $absence,
            'attendances' => $attendance,
            'allAttendances' => $allAttendance,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'Time' => $Time,
            ]);
    }
    
    public function admin(Schedule $schedule, User $user)
    {
        $users = User::with('practicesongs.song', 'practicesongs.part')->get();
        $startTime = [date('09:00:00'), date('10:40:00'), date('12:20:00'), date('13:20:00'), date('15:00:00'), date('16:40:00'), date('18:20:00'), date('19:00:00')];
        $endTime = [date('10:30:00'), date('12:10:00'), date('13:10:00'), date('14:50:00'), date('16:30:00'), date('18:10:00'), date('19:00:00'), date('20:00:00')];
        $Time = ['09:00-10:30','10:40-12:10','12:20-13:10','13:20-14:50','15:00-16:30','16:40-18:10','18:20-19:00','19:00-20:00'];
        
        $StartMonth = Carbon::now()->startOfMonth()->addMonthNoOverflow()->toDateString();
        $EndMonth = Carbon::now()->endOfMonth()->addMonthNoOverflow()->toDateString();
        $attendance = Schedule::whereBetween('start_date',[$StartMonth,$EndMonth])
        ->where('event_name',"お稽古")
        ->where('user_id', NULL)
        ->orderBy('start_date')
        ->with('desires')->get();
        
        return view('lessons.admin')->with([
            'users' => $users,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'Time' => $Time,
            'attendances' => $attendance,
            ]);

    }
}
