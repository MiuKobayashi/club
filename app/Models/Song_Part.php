<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice_Song_Part extends Model
{
    use HasFactory;
    
    //songsテーブルに対するリレーション(従)
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
    
    //partsテーブルに対するリレーション(従)
    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}
