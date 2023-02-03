<?php

namespace App\Http\Controllers;

use App\Models\ViolationReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\ViolationReportPost;
use Illuminate\Support\Facades\Mail;

class ViolationReportController extends Controller
{
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'advice_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'advice' => 'required',
            'reason' => 'required'
        ]);

        // 違反レポートをテーブルに保存
        $violation = new ViolationReport;
        $violation->advice_id = $request->input('advice_id');
        $violation->user_id = $request->input('user_id');
        $violation->title = $request->input('title');
        $violation->advice = $request->input('advice');
        $violation->reason = $request->input('reason');
        $violation->save();
        $data = [];
        Mail::send('email.mail', $data, function($message) {
            $message->to('kazenooto19841213@gmail.com')
                    ->subject('違反投稿通報が届きました');
        });
        return back()->with('message', '違反投稿を通報しました。');
    }
}
