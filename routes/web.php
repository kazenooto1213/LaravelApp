<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\AdviceCategoryController;
use App\Http\Controllers\AdviceListController;
use App\Http\Controllers\AdviceViewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\UserAdviceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GratitudeController;
use App\Http\Controllers\ViolationReportController;
use App\Models\Gratitude;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('explanation.index');
});
Route::get('redirects', [App\Http\Controllers\Auth\LoginController::class, 'index']);

// 投稿に感謝ボタン
Route::post('gratitudes', [GratitudeController::class, 'store'])->name('gratitude.store');
Route::delete('gratitudes', [GratitudeController::class, 'destroy'])->name('gratitude.destroy');

// Target（目標） routes
Route::controller(TargetController::class)->group(function() {
    Route::post('/calendar/event', 'store')->name('event'); 
    Route::put('/calendar', 'update')->name('update');
    Route::delete('/calendar', 'delete')->name('delete');
});

// Calendar routes
Route::group(['middleware' => 'auth'], function() {
    Route::controller(FullCalendarController::class)->group(function() {
        Route::post('/calendar/expense', 'store')->name('store');
        Route::get('/calendar', 'setEvents')->name('set.events');
        Route::post('/calendar', 'update')->name('expenseUpdate');
    });
});

// 収支合計ページ routes
Route::get('/calendar/total_balance', function() {
    return view('total.total_balance');
});
Route::controller(TotalController::class)->group(function() {
    Route::get('/calendar/total_balance', 'index')->name('total');
});

// アドバイス投稿ページ、advice_post routes
Route::get('/advice', function() {
    return view('advice.advice_post');
});
Route::controller(AdviceCategoryController::class)->group(function() {
    Route::get('/advice', 'index');
    Route::post('/advice/register', 'store')->name('insert');
});

// ユーザー投稿確認ページ、user_advice routes
Route::get('/advice/user', function() {
    return view('advice.user_advice');
});
Route::controller(UserAdviceController::class)->group(function() {
    Route::get('/advice/user', 'index')->name('advice.content');
    Route::post('/advice/user/edit', 'update_delete')->name('advice.edit');
});

// 投稿一覧ページ
Route::get('/list/advice', function() {
    return view('advice.advice_list');
});
Route::controller(AdviceListController::class)->group(function() {
    Route::get('/list/advice', 'index')->name('list');
});

// 投稿内容表示ページ
Route::get('/users/post_box', function() {
    return view('advice.advice');
});
Route::controller(AdviceViewController::class)->group(function() {
    Route::get('/users/post_box', 'index')->name('user.advice');
});

// 違反投稿通報
Route::controller(ViolationReportController::class)->group(function() {
    Route::post('/users/post_box', 'store')->name('violation.report');
});

// UserController(退会機能)
Route::get('/user/profile', function() {
    return view('auth.profile');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/user/profile', 'show')->middleware('auth')->name('user.profile');
    Route::delete('/user/profile', 'destroy')->name('user.delete');
});

// ContactFormController(問い合わせフォーム)
Route::controller(ContactFormController::class)->group(function() {
    Route::get('/user/contact', 'index')->name('form.show');
    Route::post('/user/contact/confirm', 'confirm')->name('form.confirm');
    Route::post('/user/contact/send', 'send')->name('form.send');
});

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');