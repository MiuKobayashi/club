<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'performance',
        'url'
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
    
    //本番の曲を取得する関数
    public function selectPerformance()
    {
        return $this->where('performance',1)
                    ->with(['parts','practicesongs.user']);
    }
    
    public static function getYouTubeVideoId()
    {
        $song = new Song();
        $urls = $song->selectPerformance()
                         ->whereNot('url', null)
                         ->pluck('url');
        
        foreach ($urls as $url) {
            $videoUrls[] = explode("/", $url)[3];
        }
        
        return $videoUrls;
    }
}
