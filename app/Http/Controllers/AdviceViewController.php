<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advice;
use App\Models\Gratitude;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdviceViewController extends Controller
{
    public function index(Request $request)
    {
        // 投稿の内容取得
        $user_advice = Advice::find($request->advice);

        // 感謝をつけた投稿のadvice_id取得
        $gratitude_id = DB::table('gratitudes')->select('advice_id')->get()->toArray();
        $gratitude_id = array_column($gratitude_id, 'advice_id');

        // ログインユーザーが投稿に感謝をした情報を取得
        $data = Gratitude::select('id', 'advice_id', 'user_id')->where('user_id', Auth::id())->where('advice_id',$request->advice)->get();

        // 感謝からuser_idを対象にログインユーザーの情報を取得
        $gratitude = Gratitude::select('id', 'advice_id', 'user_id')->where('user_id', Auth::id())->where('advice_id',$request->advice)->get()->toArray();

        // 感謝合計
        $total_gratitude = Gratitude::select('advice_id')->where('advice_id', $request->advice)->get();
        return view('advice.advice', compact('user_advice', 'data', 'gratitude', 'gratitude_id', 'total_gratitude'));
    }

}
