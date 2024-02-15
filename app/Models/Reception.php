<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc', 'fojas', 'type', 'estate',
        'evaluation_id', 'warranty_id', 'document_id'
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function warranty()
    {
        return $this->belongsTo(Warranty::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
