<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserId;
use App\Models\AdviceCategorys;
use App\Models\Advice;
use Illuminate\Support\Facades\DB;


class AdviceCategoryController extends Controller
{
    public function index(Request $request)
    {
        // 投稿の項目全てをadvice_categorysテーブルから取得
        $categorys = DB::table('advice_categorys')->get();
        return view('advice.advice_post', compact('categorys'));
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'category' => 'required',
            'advice' => 'required',
        ]);

        // チェックボックス（複数選択時、複数レコード登録出来る様に）で選択された数分、for文でDBにそれぞれを登録させる
        $adviceCategory = $request->get('category');
        for($i = 0; $i < count($adviceCategory); $i++) {
            $advice = new Advice();
            $advice->user_id = $request->input('user_id');
            $advice->category = $request->input('category')[$i];
            $advice->title = $request->input('title');
            $advice->advice = $request->input('advice');
            $advice->save();
        }
        return redirect('/advice')->with('message', '投稿が完了致しました。');
    }
}
