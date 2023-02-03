<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationReport extends Model
{
    use HasFactory;

    protected $table = 'violation_reports';

    // 保護
    protected $fillable = [
        'advice_id',
        'user_id',
        'title',
        'advice',
        'reason'
    ];
}
