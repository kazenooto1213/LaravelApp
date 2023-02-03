<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Mail\AdminNotificationMail;
use App\Http\Controllers\Controller;

class AdminUserNoticeController extends Controller
{
    public function getshow()
    {
        $admin = Admin::select('created_at')->first();
        return view('admin.admin_user_notice', compact('admin'));
    }

    public function confirm(Request $request)
    {
        $admin = Admin::select('created_at')->first();
        // バリデーション
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        // フォームからの入力値を全て取得
        $inputs = $request->all();

        // 確認ページ表示、入力値を引数に渡す
        return view('admin.admin_confirm', compact('admin', 'inputs'));
    }

    public function send(Request $request)
    {
        $admin = Admin::select('created_at')->first();
        // バリデーション
        $request->validate([
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
            return redirect('admin/user/notification')->withInput($inputs);
        } else {
            // 送信ボタンの場合、送信処理
            // ユーザーにメール送信
            \Mail::to(User::all())->send(new AdminNotificationMail($inputs));
            // 管理者にメールを送信
            \Mail::to('kazenooto19841213@gmail.com')->send(new AdminNotificationMail($inputs));
            // 二重送信対策のためのトークンを再発行
            $request->session()->regenerateToken();
            return view('admin.admin_send', compact('admin'));
        }
    }
}

    
