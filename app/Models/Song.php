<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    
    //songs_partsテーブルに対するリレーション(主)
    public function songs_parts()
    {
        return $this->hasMany(Song_Part::class);
    }
    
    //practice_songsテーブルに対するリレーション(主)
    public function practice_songs()
    {
        return $this->hasMany(Practice_Song::class);
    }
}
