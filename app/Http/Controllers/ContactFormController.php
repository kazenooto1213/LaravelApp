<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ContactFormMail;

class ContactFormController extends Controller
{
    public function index()
    {
        $name = User::select('name')->where('name', Auth::user()->name)->first();
        return view('auth.inquiry', compact('name'));
    }

    public function confirm(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required'
        ]);

        // フォームからの入力値を全て取得
        $inputs = $request->all();

        // 確認ページ表示、入力値を引数に渡す
        return view('auth.confirm', compact('inputs'));
    }

    public function send(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required'
        ]);

        // action値取得
        $action = $request->input('action');
        // action以外のinput値を取得
        $inputs = $request->except('action');
        // action値で分岐
        if($action !== 'submit') {
            // 内容修正ボタンのリダイレクト処理
            return redirect()->route('form.show')
                             ->withInput($inputs);
        } else {
            // 送信ボタンの場合、送信処理
            // ユーザーにメール送信
            \Mail::to($inputs['email'])->send(new ContactFormMail($inputs));
            // 管理者にメールを送信
            \Mail::to('kazenooto19841213@gmail.com')->send(new ContactFormMail($inputs));
            // 二重送信対策のためのトークンを再発行
            $request->session()->regenerateToken();
            return view('email.send');
        }
    }
}
