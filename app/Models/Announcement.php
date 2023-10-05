<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Announcement extends Model
{
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 3)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'title',
        'description',
    ];
}
