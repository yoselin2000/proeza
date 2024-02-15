<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyExpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'evaluation_id', 'expense_type_id',
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function expenseType()
    {
        return $this->belongsTo(ExpenseType::class);
    }
}
