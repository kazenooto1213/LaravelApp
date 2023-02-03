<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    use HasFactory;

    // 同じクラス内のみアクセス可能
    protected $table = 'advices';

    // id, user_id, category, title, adviceを保護
    protected $fillable = [
        'user_id',
        'category',
        'title',
        'advice',
    ];

    // 投稿は沢山の感謝を持つ（リレーション）
    public function gratitudes()
    {
        return $this->hasMany(Gratitude::class);
    }

    // 投稿はユーザーと多対多の関係（リレーション）
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function adviceCategory()
    {
        return $this->belongsTo(AdviceCategorys::class);
    }
}
