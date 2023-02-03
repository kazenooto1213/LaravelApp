<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;

class UserId extends Model
{
    use HasFactory;

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    protected $fillable = [
        'id',
    ];

    protected $table = 'users';

    protected $dates = ['deleted_at'];

    public function target()
    {
        return $this->hasOne(Target::class);
    }

    public function gratitudes()
    {
        return $this->hasMany(Gratitude::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function advices()
    {
        return $this->hasMany(Advice::class);
    }
}
