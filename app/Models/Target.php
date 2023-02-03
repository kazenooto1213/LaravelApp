<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'target_category',
        'target',
    ];

    protected $table = 'target';

    public function getData() {
        $data = DB::table($this->table)->get();
        return $data;
    }

    public function userId()
    {
        return $this->belongsTo(UserId::class);
    }
}
