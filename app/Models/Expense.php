<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_category', 'expense', 'color', 'text_color', 'start', 'end'
    ];

    protected $table = 'expense';

    public function user()
    {
        return $this->belongsTo(UserId::class);
    }
}
