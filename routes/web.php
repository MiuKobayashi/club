<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PracticeSongController;
use App\Http\Controllers\DesireController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//ホーム画面
// Route::get('/', [AnnouncementController::class, 'announcement'])->middleware(['auth', 'verified'])->name('home');
Route::get('/', [ScheduleController::class, 'countAttendance'])->middleware(['auth', 'verified'])->name('home');

//進捗状況画面
Route::get('/progress', [SongController::class, 'progress'])->name('progress');
//進捗状況登録画面
Route::get('/progress/create', [SongController::class, 'songs']);

//進捗状況保存画面
Route::post('/progress/create', [PracticeSongController::class, 'store'])->name('songStore');
Route::post('/progress', [PracticeSongController::class, 'done'])->name('done');

//希望日程確認画面
Route::get('/desire', [DesireController::class, 'desire'])->name('desire');
//希望日程登録画面
Route::get('/desire/create', [ScheduleController::class, 'desireCreate'])->name('create');
Route::post('/desire/create', [ScheduleController::class, 'store'])->name('desireStore');
Route::delete('/desire/create', [ScheduleController::class, 'delete'])->name('absenceDelete');

//管理者画面
Route::middleware(['auth', 'admin'])
->group(function () {
    Route::get('/admin', [DesireController::class, 'admin'])->name('admin');
    Route::post('/admin', [AnnouncementController::class, 'store']);
});
//お知らせ登録
Route::get('/admin/create', [AnnouncementController::class, 'create']);
//お知らせ編集
Route::get('/admin/edit', [AnnouncementController::class, 'edit']);
Route::put('/admin', [AnnouncementController::class, 'update']);
    

//FullCalendarイベント登録
Route::get('/schedule-add', [ScheduleController::class, 'scheduleAdd'])->name('schedule-add');
Route::post('/schedule-add', [ScheduleController::class, 'scheduleAdd'])->name('schedule-add');
//FullCalendarイベント取得
Route::get('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');
Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');
//FullCalendarイベント削除
Route::get('/schedule-delete', [ScheduleController::class, 'scheduleDelete'])->name('schedule-delete');
Route::post('/schedule-delete', [ScheduleController::class, 'scheduleDelete'])->name('schedule-delete');


//プロフィール画面
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
