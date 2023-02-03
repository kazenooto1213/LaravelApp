<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Event as GlobalEvent;
use Redirect, Response;
use Illuminate\Support\Facades\Validator;
use Alert;
use App\Models\Target;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FullCalendarController extends Controller
{   
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'expense_category' => 'required',
            'expense' => 'required',
            'color' => 'required',
            'text_color' => 'required',
            'start' => 'required',
        ]);

        // 出費をテーブルに登録
        $expense = new Expense;
        $expense->user_id = $request->input('user_id');
        $expense->expense_category = $request->input('expense_category');
        $expense->expense = $request->input('expense');
        $expense->color = $request->input('color');
        $expense->text_color = $request->input('text_color');
        $expense->start = $request->input('start');
        $expense->save();
        return redirect('/calendar')->with('message', '登録が完了致しました。');
    }

    public function setEvents(Request $request)
    {
        // Fullcalendarの日付部分に表示させるeventの定義、Fullcalendarで表示出来る様に表示したいカラム名をasで記述
        // ログインユーザーの値だけを表示する為、where以降の記述をしている
        // JSON形式で表示出来る様になる為、json_encodeで変数eventをJSON化している。
        $event = Expense::select('id', 'user_id', 'expense_category as description', 'expense as title', 'color', 'text_color as textColor', 'start')->where('user_id', Auth::id())->get()->toArray();
        json_encode($event);
        // 家計簿の目標全てをtargetテーブルから取得し、toArrayで配列にしている
        $targets = DB::table('target')->get()->toArray();
        // 家計簿の目標からuser_idをログインユーザーのidを対象に取得し、配列にしている。
        $user_target = Target::select('user_id')->where('user_id', Auth::user()->id)->get()->toArray();
        $user_target = array_column($user_target, 'user_id');
        // ログインユーザーのidを配列にし、blade.phpでif文の条件式が揃う様にしている。
        $id = array(Auth::user()->id);
        // 出費項目をexpense_categoryテーブルから全て取得
        $expense_category = DB::table('expense_category')->get();
        return view('full-calendar', compact('event', 'targets', 'user_target', 'id','expense_category'));
    }

    public function update(Request $request)
    {
        // 家計簿の出費、編集(updateを持っていたら)、削除(deleteを持っていたら)を行う為の記述
        if($request->has('update'))
        {
            // バリデーション
            $request->validate([
                'id' => 'required',
                'user_id' => 'required',
                'expense_category' => 'required',
                'expense' => 'required',
                'color' => 'required',
                'text_color' => 'required',
            ]);
            $expense = Expense::find($request->id);
            $expense->id = $request->id;
            $expense->user_id = $request->user_id;
            $expense->expense_category = $request->expense_category;
            $expense->expense = $request->expense;
            $expense->color = $request->color;
            $expense->text_color = $request->text_color;
            $expense->update();
            return redirect('/calendar')->with('message', '出費を編集しました。');
        } elseif ($request->has('delete'))
        {
            // リクエストのidを物理削除
            $expense = Expense::find($request->id)->forceDelete();
            return redirect('/calendar')->with('message', '出費を削除しました。');
        }      
    }
}
