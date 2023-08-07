<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice_Song extends Model
{
    use HasFactory;
    
    //usersテーブルに対するリレーション(従)
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    //songsテーブルに対するリレーション(従)
    public function songs()
    {
        return $this->belongsTo(Song::class);
    }
}
