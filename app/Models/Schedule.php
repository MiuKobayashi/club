<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = [
        'start_date',
        'end_date'
    ];
    
    public function desires()
    {
        return $this->hasMany(Desire::class);
    }
    
    //FullCalendarのイベントを取得するの関数
    public static function getFormattedEvents($start_date, $end_date, $userId = null)
    {
        $query = self::query()
            ->select('id', 'event_name as title', 'start_date', 'end_date')
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date);
    
        if ($userId !== null) {
            $query->where('user_id', $userId)->orWhereNull('user_id');
        }
    
        $events = $query->get();
    
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
    
        return $formattedEvents;
    }
    
    //来月の全体の活動日を取得する関数
    public function selectNextMonthLessons()
    {
        $nextStartMonth = Carbon::now()->startOfMonth()->addMonthNoOverflow()->toDateString();
        $nextEndMonth = Carbon::now()->endOfMonth()->addMonthNoOverflow()->toDateString();
    
        return $this->whereBetween('start_date', [$nextStartMonth, $nextEndMonth])
                    ->where('event_name', "お稽古")
                    ->where('user_id', NULL)
                    ->orderBy('start_date');
    }
    
    //今月の自分の活動日を抽出する関数
    public function selectThisMonthLessons()
    {
        $StartMonth = Carbon::now()->startOfMonth()->toDateString();
        $EndMonth = Carbon::now()->endOfMonth()->toDateString();
        
        return $this->whereBetween('start_date',[$StartMonth, $EndMonth])
                    ->where('user_id', auth()->user()->id)
                    ->orderBy('start_date');
    }
    
    public static function getTimes()
    {
        $startTime = [date('09:00:00'), date('10:40:00'), date('12:20:00'), date('13:20:00'), date('15:00:00'), date('16:40:00'), date('18:20:00'), date('19:00:00')];
        $endTime = [date('10:30:00'), date('12:10:00'), date('13:10:00'), date('14:50:00'), date('16:30:00'), date('18:10:00'), date('19:00:00'), date('20:00:00')];
        $Time = ['09:00-10:30','10:40-12:10','12:20-13:10','13:20-14:50','15:00-16:30','16:40-18:10','18:20-19:00','19:00-20:00'];
        
        return [
            'startTime' => $startTime,
            'endTime' => $endTime,
            'Time' => $Time
        ];
    }
    
}
