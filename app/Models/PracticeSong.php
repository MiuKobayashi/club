<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class PracticeSong extends Model
{
    protected $fillable = [
        'song_id',
        'part_id',
        'user_id',
        'inprogress',
        ];
        
    use HasFactory;
    
    //partテーブルに対するリレーション(従)
    public function part()
    {
        return $this->belongsTo(Part::class);
    }
    
    //Songテーブルに対するリレーション(従)
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
    
    //userテーブルに対するリレーション(従)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function notInProgress()
    {
        return $this->where('user_id',auth()->id())
                    ->update([
                        'inprogress' => 0
                    ]);
    }
}