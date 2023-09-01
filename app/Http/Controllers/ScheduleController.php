<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function Schedule(User $user) 
    {
        $admin = auth()->user()->admin;

        return response()->json(['admin' => $admin]);
    }
    
    public function scheduleAdd(Request $request)
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
        $schedule->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $schedule->end_date = date('Y-m-d', $request->input('end_date') / 1000);
        $schedule->event_name = $request->input('event_name');
        $schedule->save();

        return;
    }
    
    public function scheduleGet(Request $request)
    {
        // バリデーションで32文字以上を制限
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
        ]);
        
        //カレンダー表示期間
        $start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);
        
        return Schedule::query()
            ->select(
                //fullCalendarの形式に
                'id',
                'start_date as start',
                'end_date as end',
                'event_name as title'
            )
            //FullCalendarの表示範囲を表示
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->get();
    }
    
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

    public function attendance(Schedule $schedule)
    {
        //今月の活動日
        $StartMonth = Carbon::now()->startOfMonth()->toDateString();
        $EndMonth = Carbon::now()->endOfMonth()->toDateString();
        $attendance = Schedule::whereBetween('Start_date',[$StartMonth,$EndMonth])->where('event_name',"お稽古")->get();
        return view('lessons.home')->with([
            'attendances' => $attendance,
            'startmonth' => $StartMonth,
            'endmonth' => $EndMonth]);
    }
    
}