<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    
    //songs_partsテーブルに対するリレーション(主)
    public function songs_parts()
    {
        return $this->hasMany(Song_Part::class);
    }
}
