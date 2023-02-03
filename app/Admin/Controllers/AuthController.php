<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Encore\Admin\Controllers\AuthController as BaseAuthController;
use App\Models\Admin;
use App\Models\User;
use App\Models\Advice;
use App\Models\ViolationReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends BaseAuthController
{
  public function index(Request $request)
  {
    // 管理者
    $admin = Admin::select('created_at')->first();

    // フォームから渡されている違反投稿のID
    $id = $request->id;
    // 違反投稿
    $violation = ViolationReport::select('id' ,'advice_id')->where('id', $id)->first();
    // 該当投稿取得
    $advice = Advice::select('id', 'user_id', 'advice')->where('id', $violation->advice_id)->first();
    // 該当ユーザー取得
    $user = User::select('id', 'name')->where('id', $advice->user_id)->first();
    return view('admin.admin_violation_report', compact('id' ,'user', 'advice' ,'admin'));
  }

  public function destroy(Request $request)
  {
    $user_id = User::find($request->id);
    $email = $user_id->email;
    $data = [];
    Mail::send('email.offender', $data, function($message) use ($email) {
      $message->to($email)
              ->subject('利用規約の違反に該当した方に送信しております。');
    });
    $delete_user = User::find($request->id)->forceDelete();
    return redirect('/admin')->with('message', '違反投稿者を削除しました。');
  }
}
