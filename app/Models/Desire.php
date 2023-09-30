<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desire extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'start_time',
        'end_time',
        'user_id',
        'schedule_id',
        'remarks'
    ];
    
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
