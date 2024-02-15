<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name','cant','unit','performance','price', 'article_id', 'total'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
