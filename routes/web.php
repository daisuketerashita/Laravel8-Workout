<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

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

//一覧ページ
Route::get('/',[ScheduleController::class,'index'])->name('index');
// イベント取得処理
Route::post('/schedule-get',[ScheduleController::class,'scheduleGet'])->name('schedule-get');
//部位登録画面
Route::get('/calendar/add/{id}',[ScheduleController::class,'add'])->name('add');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
