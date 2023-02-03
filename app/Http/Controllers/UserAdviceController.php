<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advice;
use App\Models\AdviceCategorys;
use App\Models\User;
use App\Models\Gratitude;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserAdviceController extends Controller
{
    public function index()
    {
        // ログインユーザーの投稿のみをページネーションで12件表示
        // withでリレーション先のデータを取得、感謝のidとadvice_id
        $advices = Advice::where('user_id', Auth::id())->with('gratitudes:id,advice_id')->paginate(12);
        $advice_category = AdviceCategorys::select('id','category')->get();
        return view('advice.user_advice', compact('advices', 'advice_category'));
    }

    public function update_delete(Request $request)
    {
        // 投稿の編集(updateを持っていたら)、削除(deleteを持っていたら)を行う記述
        if($request->has('update'))
        {
            // バリデーション
            $request->validate([
                'id' => 'required',
                'title' => 'required',
                'advice' =>'required'
            ]);
            // 編集内容
            $advice = Advice::find($request->id);
            $advice->id = $request->id;
            $advice->title = $request->title;
            $advice->advice = $request->advice;
            $advice->update();
            return redirect('/advice/user')->with('message', '投稿を編集しました。');
        } elseif ($request->has('delete'))
        {
            // リクエストのidを物理削除
            $data = Advice::find($request->id);
            $data->delete();
            return redirect('/advice/user')->with('message', '投稿を削除しました。');
        }
    }
}
