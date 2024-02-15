<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'file', 'evaluation_id', 'archive_type_id', 
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function archiveType()
    {
        return $this->belongsTo(ArchiveType::class);
    }
}
