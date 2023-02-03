<?php

namespace App\Http\Controllers;

use App\Models\Gratitude;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GratitudeController extends Controller
{
    public function store(Request $request)
    {
        // 感謝の登録
        $gratitude = new Gratitude();
        $gratitude->advice_id = $request->input('advice_id');
        $gratitude->user_id = Auth::user()->id;
        $gratitude->save();
        return back()->with('message', '投稿に感謝を送りました。');
    }

    public function destroy(Request $request)
    {
        // 感謝を外す
        $gratitude = Gratitude::find($request->id);
        $gratitude->delete();
        return back()->with('message', '投稿への感謝を外しました。');
    }
}
