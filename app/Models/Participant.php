<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'application_id', 'category_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class);
    }
}
