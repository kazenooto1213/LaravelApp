<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // 同じクラス内のみアクセス可能
    protected $table = 'admin_users';

    // id, user_id, category, title, adviceを保護
    protected $fillable = [
        'id',
        'username',
        'password',
        'name',
        'avatar',
    ];
}
