<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ExerciseController;
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

Auth::routes();

//ログインユーザーのみアクセスできる
Route::group(['middleware' => 'auth'], function () {
    //一覧ページ
    Route::get('/', [ScheduleController::class, 'index'])->name('index');
    // イベント取得処理
    Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');
    //部位登録画面
    Route::get('/calendar/add/{id}', [ScheduleController::class, 'add'])->name('add');
    Route::post('/calendar/add/{id}', [ScheduleController::class, 'store'])->name('store');
    //部位削除
    Route::get('/calendar/{id}/delete/', [ScheduleController::class, 'delete'])->name('sch.delete');

    //詳細ページ
    Route::get('/calendar/detail/{date}/{title}', [ScheduleController::class, 'detail'])->name('detail');

    //種目登録
    Route::get('/calendar/add/exercise/{id}', [ExerciseController::class, 'add'])->name('exe.add');
    Route::post('/calendar/add/exercise/{id}', [ExerciseController::class, 'store'])->name('exe.store');
    //種目編集
    Route::get('/calendar/{id}/edit/{exe_id}', [ExerciseController::class, 'edit'])->name('exe.edit');
    Route::post('/calendar/{id}/edit/{exe_id}', [ExerciseController::class, 'update'])->name('exe.update');
    //種目削除
    Route::get('/calendar/{id}/delete/{exe_id}', [ExerciseController::class, 'delete'])->name('exe.delete');
});

//使い方ページ
Route::get('/howto', [ScheduleController::class, 'howto'])->name('howto');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
