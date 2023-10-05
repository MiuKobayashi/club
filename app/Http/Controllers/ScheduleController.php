<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DesireRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Desire;
use App\Models\Announcement;
use Carbon\Carbon;

class ScheduleController extends Controller
{
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
    
    public function scheduleGet(Request $request)
    {
        // バリデーションで32文字以上を制限
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
        ]);
        
        //カレンダー表示期間
        $start_date = date('Y-m-d H:i:s', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d H:i:s', $request->input('end_date') / 1000);
        
        $events = Schedule::query()
            ->select('id', 'event_name as title', 'start_date', 'end_date')
            ->where('user_id', auth()->user()->id)
            ->orWhereNull('user_id')
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->get();
        
        $formattedEvents = $events->map(function ($event) {
            $start = Carbon::parse($event->start_date);
            $end = Carbon::parse($event->end_date);
        
            // もし時刻が '00:00:00' であれば日付のみにフォーマット
            if ($start->format('H:i:s') === '00:00:00' && $end->format('H:i:s') === '00:00:00') {
                $event->start = $start->format('Y-m-d');
                $event->end = $end->format('Y-m-d');
            } else {
                // それ以外の場合はそのままフォーマット
                $event->start = $start->format('Y-m-d H:i:s');
                $event->end = $end->format('Y-m-d H:i:s');
            }

            return $event;
        });

        return response()->json($formattedEvents);
        
    }
    
    public function scheduleGetAll(Request $request)
    {
        // バリデーションで32文字以上を制限
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
        ]);
        
        //カレンダー表示期間
        $start_date = date('Y-m-d H:i:s', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d H:i:s', $request->input('end_date') / 1000);
        

        return Schedule::query()
            ->select(
                //fullCalendarの形式に
                'id',
                'start_date as start',
                'end_date as end',
                'event_name as title',
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

    public function store(DesireRequest $request, Desire $desire)
    {
        $input = $request['desire'];
        $desire->fill($input);
        $desire->user_id = auth()->user()->id;
        $desire->save();
        return redirect('/desire/create');
    }

    public function desireCreate(Schedule $schedule)
    {
        //来月の活動日
        $StartMonth = Carbon::now()->startOfMonth()->addMonthNoOverflow()->toDateString();
        $EndMonth = Carbon::now()->endOfMonth()->addMonthNoOverflow()->toDateString();
        $attendance = Schedule::whereBetween('start_date',[$StartMonth,$EndMonth])
        ->where('event_name',"お稽古")
        ->where('user_id', NULL)
        ->orderBy('start_date')
        ->with(['desires'=> function ($query) {
            $query->where('user_id', auth()->user()->id);
        }])->get();
        

        return view('lessons.desire_create')->with([
            'attendances' => $attendance,
            ]);
    }

    
    public function delete(Request $request, Schedule $schedule)
    {
        $input = $request['absence'];
        $schedule::where('id', $input)->delete();
        return redirect('/desire');
    }
    
    
    public function countAttendance(Announcement $announcement, Schedule $schedule)
    {
        $announce = new Announcement();
        $announcement = $announce->getPaginateByLimit();
        
        //今月の活動日
        $StartMonth = Carbon::now()->startOfMonth()->toDateString();
        $EndMonth = Carbon::now()->endOfMonth()->toDateString();
        $attendance = Schedule::whereBetween('start_date',[$StartMonth,$EndMonth])
        ->where('event_name',"お稽古")
        ->where('user_id', auth()->user()->id )
        ->where('deleted_at', NULL)
        ->count();
        $amount = 1000*$attendance;

        return view('lessons.home')->with([
            'announcements' => $announcement,
            'attendances' => $attendance,
            'amount' => $amount]);
        
    }
}