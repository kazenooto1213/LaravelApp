<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Target;
use Redirect, Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TargetController extends Controller
{
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'target_category' => 'required',
            'target' => 'required|integer'
        ]);

        $target = new Target;
        $target->user_id = $request->input('user_id');
        $target->target_category = $request->input('target_category');
        $target->target = $request->input('target');
        $target->save();
        return redirect('/calendar')->with('message', '目標を設定しました。');
    }

    public function update(Request $request)
    {
        // バリデーション
        $request->validate([
            'user_id',
            'target_category' => 'required',
            'target' =>'required'
        ]);
        $user = Target::find($request->id);
        $user->user_id = $request->user_id;
        $user->target_category = $request->target_category;
        $user->target = $request->target;
        $user->update();
        return redirect('/calendar')->with('message', '目標を編集しました。');
    }

    public function delete(Request $request)
    {
        // リクエストのidを物理削除
        $user = Target::find($request->id)->forceDelete();
        return redirect('/calendar')->with('message', '目標を削除しました。');
    }
}
