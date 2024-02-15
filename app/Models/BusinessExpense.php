<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessExpense extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'amount', 'activity_id', 'expense_type_id',

    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function expenseType()
    {
        return $this->belongsTo(ExpenseType::class);
    }
}
