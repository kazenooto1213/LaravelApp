<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\UserId;


class UserController extends Controller
{
    public function show()
    {
        // ログインユーザーの情報
        $user = auth()->user();
        return view('auth.profile', compact('user'));
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        if($user->deleted_at) {
           $user->deleted_at = false;
        } else {
           $user->deleted_at = true;
        }
        $user->update();
        Auth::logout();
        return redirect('/');
    }
}
