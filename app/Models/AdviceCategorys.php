<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdviceCategorys extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category'
    ];

    protected $table = 'advice_categorys';

    public function advices()
    {
        return $this->hasMany(Advice::class);
    }
}
