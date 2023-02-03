<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advice;
use App\Models\AdviceCategorys;
use Illuminate\Support\Facades\DB;

class AdviceListController extends Controller
{
    public function index(Request $request)
    {
        // 投稿をカテゴリーでソート
        if($request->category !== null) {
            $advices = Advice::where('category', $request->category)->paginate(12);
            $total_count = Advice::where('category', $request->category)->count();
            $sort_category = AdviceCategorys::find($request->category);
        } else {
            $advices = Advice::paginate(12);
            $total_count = "";
            $sort_category = null;
        }
        // 投稿のカテゴリーを取得
        $categorys = AdviceCategorys::all();

        // 検索フォームで入力された値を取得
        $search = $request->input('search');

        // クエリビルダ
        $query = Advice::query();
        
        //検索フォームにキーワードが入力されたら
        if($search) {
            // 全角スペースを半角変換
            $spaceConversion = mb_convert_kana($search, 's');
            // 単語を半角スペースで区切り、配列
            $keywords = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // 単語をループで回し、投稿と部分一致するものがあれば、$queryとして保持される
            foreach($keywords as $word) {
                $query->where('title', 'like', '%'.$word.'%');
            }
            // 取得した$queryをページネーション
            $advices = $query->latest('created_at')->paginate(12);
        }

        return view('advice.advice_list', compact('categorys', 'sort_category', 'advices', 'total_count'));
    }
}
