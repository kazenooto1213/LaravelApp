<?php

use App\Admin\Controllers\AdminUserNoticeController;
use App\Admin\Controllers\AdviceController;
use Illuminate\Routing\Router;
use App\Admin\Controllers\HomeController;
use App\Admin\Controllers\AuthController;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\ViolationReportController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/user/notification', 'AdminUserNoticeController@getshow')->name('user.notice');
    $router->post('user/notification/confirm', 'AdminUserNoticeController@confirm')->name('admin.confirm');
    $router->post('user/notification/confirm/send', 'AdminUserNoticeController@send')->name('confirm.send');
    $router->get('admin_violation_report', 'AuthController@index')->name('offender.delete');
    $router->delete('admin_violation_report_delete', 'AuthController@destroy')->name('offender.user');
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UserController::class);
    $router->resource('violation_report', ViolationReportController::class);
    $router->resource('users_advice', AdviceController::class);
});
