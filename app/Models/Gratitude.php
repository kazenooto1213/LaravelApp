<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gratitude extends Model
{
    use HasFactory;

    protected $table = 'gratitudes';

    protected $fillable = [
        'id',
        'advice_id',
        'user_id',
    ];

    public function advice()
    {
        return $this->belongsTo(Advice::class);
    }

    public function user()
    {
        return $this->belongsTo(UserId::class);
    }
}
