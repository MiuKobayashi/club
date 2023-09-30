<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];
    
    //songsテーブルに対するリレーション(多対多)
    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
    
    //practice_songsテーブルに対するリレーション(主)
    public function practicesongs()
    {
        return $this->hasMany(PracticeSong::class);
    }
}
