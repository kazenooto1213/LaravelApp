<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Target;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class TotalController extends Controller
{
    public function index(Request $request)
    {
        // 年月のセレクトボックス、optionのvalue値として記述
        $years = ['2020', '2021', '2022', '2023', '2024', '2025'];
        $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $year = $request->yyyy;
        $month = $request->mm;
        if($request->yyyy === null) {
            $year = date('Y');
        }
        if($request->mm === null) {
            $month = date('m');
        }

        // ログインユーザーの目標をtargetテーブルから取得
        $targets = DB::table('target')
                    //  ->whereYear('created_at', $year)
                    //  ->whereMonth('created_at', $month)
                     ->where('user_id', Auth::id())
                     ->get();

        // 出費の項目を降順で取得
        $totals = Expense::orderBy('expense_category', 'desc')
                         ->select('expense_category')
                         ->selectRaw('SUM(expense) AS total_expense')
                         ->groupBy('expense_category')
                         ->whereYear('start', $year)
                         ->whereMonth('start', $month)
                         ->where('user_id', Auth::id())
                         ->get();

        // 出費を降順で取得
        $sort_expense = Expense::orderBy('expense', 'desc')
                               ->select('expense_category')
                               ->selectRaw('SUM(expense) AS total_expense')
                               ->groupBy('expense_category')
                               ->whereYear('start', $year)
                               ->whereMonth('start', $month)
                               ->where('user_id', Auth::id())
                               ->get();

        // ログインユーザーの出費合計をexpenseカラムからsumで合計値取得
        $total_expense = Expense::select('expense')
                                ->whereYear('start', $year)
                                ->whereMonth('start', $month)
                                ->where('user_id', Auth::id())
                                ->sum('expense');

        // chart.jsで表示させる出費の記述
        $expenses = Expense::orderBy('expense', 'desc')
                           ->select('expense_category')
                           ->selectRaw('SUM(expense) AS total_expense')
                           ->groupBy('expense_category')
                           ->whereYear('start', $year)
                           ->whereMonth('start', $month)
                           ->where('user_id', Auth::id())
                           ->get();
        $expense_category = $expenses->mapWithKeys(function ($item, $key) {
            return [$item->expense_category => $item->total_expense];
        });
        $expenses = json_decode($expense_category);

        return view('total.total_balance', compact('targets', 'totals', 'total_expense', 'sort_expense', 'expenses', 'years', 'months'));
    }

}
