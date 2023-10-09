<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DesireRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Desire;
use App\Models\Announcement;

class ScheduleController extends Controller
{
    //FullCalendarイベント登録
    public function scheduleAdd(Request $request, User $user)
    {   
        // バリデーションで32文字以上を制限
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
            'event_name' => 'required|max:32',
        ]);

        // 登録処理
        $schedule = new Schedule;
        // 日付、秒の変換
        $schedule->start_date = date('Y-m-d H:i:s', $request->input('start_date') / 1000);
        $schedule->end_date = date('Y-m-d H:i:s', $request->input('end_date') / 1000);
        $schedule->event_name = $request->input('event_name');
        $user_id = $request->input('user_id');
        $schedule->user_id = $user_id;
        $schedule->save();
        
        return;
    }
    
    //FullCalendarイベント表示（自分）
    public function scheduleGet(Request $request)
    {
        // バリデーションで32文字以上を制限
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
        ]);
    
        $start_date = date('Y-m-d H:i:s', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d H:i:s', $request->input('end_date') / 1000);
    
        // ログインユーザーの ID を取得
        $userId = auth()->user()->id;
    
        $formattedEvents = Schedule::getFormattedEvents($start_date, $end_date, $userId);
    
        return response()->json($formattedEvents);
    }
    
    //FullCalendarイベント表示（全員）
    public function scheduleGetAll(Request $request)
    {
        // バリデーションで32文字以上を制限
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
        ]);
    
        $start_date = date('Y-m-d H:i:s', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d H:i:s', $request->input('end_date') / 1000);
    
        $formattedEvents = Schedule::getFormattedEvents($start_date, $end_date);
    
        return response()->json($formattedEvents);
    }
    
    //FullCalendarイベント削除
    public function scheduleDelete(Request $request)
    {   
        $schedule = Schedule::find($request->id);
        if ($schedule) {
            $schedule->delete();
            return response()->json(['message' => 'Event deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Event not found'], 404);
        }
    }
    
    //お稽古希望日時画面
    public function desireView(Schedule $schedule)
    {
        //今月の自分の活動日
        $absence = $schedule->selectThisMonthLessons()->get();
        
        //来月の自分の活動日
        $attendance = $schedule->selectNextMonthLessons()
                                ->with(['desires'=> function ($query) {
                                    $query->where('user_id', auth()->user()->id);
                                }])->get();
        
        //来月の全体の活動日
        $allAttendance = $schedule->selectNextMonthLessons()
                                  ->with('desires')
                                  ->get();
        
        $times = Schedule::getTimes();
        
        $startTime = $times['startTime'];
        $endTime = $times['endTime'];
        $Time = $times['Time'];
        
        return view('lessons.desire')->with([
            'absences' => $absence,
            'attendances' => $attendance,
            'allAttendances' => $allAttendance,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'Time' => $Time,
            ]);
    }
    
    //お稽古希望日時登録画面
    public function desireCreateView(Schedule $schedule)
    {
        //来月の活動日
        $attendance = $schedule ->selectNextMonthLessons()
                                ->with(['desires'=> function ($query) {
                                    $query->where('user_id', auth()->user()->id);
                               }])
                                ->get();
        
        $Time = ['09:00-10:30','10:40-12:10','12:20-13:10','13:20-14:50','15:00-16:30','16:40-18:10','18:20-19:00','19:00-20:00'];

        return view('lessons.desire_create')->with([
            'attendances' => $attendance,
            'Time' => $Time,
            ]);
    }
    
    public function desireCreateStore(DesireRequest $request, Desire $desire)
    {
        $input = $request['desire'];
        $desire->fill($input);
        $desire->user_id = auth()->user()->id;
        $desire->save();
        return redirect('/desire/create');
    }
    
    public function delete(Request $request, Schedule $schedule)
    {
        $input = $request['absence'];
        $schedule::where('id', $input)->delete();
        return redirect('/desire');
    }
    
    
    public function homeView(Announcement $announcement, Schedule $schedule)
    {
        $memberNames = User::pluck('name');
        $announcements = $announcement->getPaginateByLimit();
        
        //今月の活動日
        $attendance = $schedule
            ->selectThisMonthLessons()
            ->where('deleted_at', NULL)
            ->count();
        $amount = 1000*$attendance;

        return view('lessons.home')->with([
            'memberNames' => $memberNames,
            'announcements' => $announcements,
            'attendances' => $attendance,
            'amount' => $amount]);
        
    }
}