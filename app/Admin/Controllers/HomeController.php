<?php

namespace App\Admin\Controllers;

use App\Models\ViolationReport;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $violation_reports = ViolationReport::select('user_id', 'created_at')->get();
        $admin = Admin::select('created_at')->first();
        $user = DB::table('users')->select('id', 'name')->get();
        $user_delete = DB::table('users')->select('id', 'name', 'deleted_at')->get();
        return view('admin.admin', compact('violation_reports', 'admin', 'user', 'user_delete'));
    }
}
