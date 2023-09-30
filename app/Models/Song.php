<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'performance'
    ];
    
    //part_songテーブルに対するリレーション(主)
    public function song_part()
    {
        return $this->hasMany(Song_Part::class);
    }
    
    //usersテーブルに対するリレーション(多対多)
    public function users()
    {
        return $this->belongsToMany(User::class, 'practice_songs');
    }
    //partsテーブルに対するリレーション(多対多)
    public function parts()
    {   
        return $this->belongsToMany(Part::class);
    }
    
    //practice_songsテーブルに対するリレーション(主)
    public function practicesongs()
    {
        return $this->hasMany(PracticeSong::class);
    }
}
