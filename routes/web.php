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


Route::controller(SongController::class)->middleware(['auth'])->group(function(){
    //進捗状況画面
    Route::get('/progress', 'progress')->name('progress');
    //進捗状況登録画面
    Route::get('/progress/create', 'songs')->name('progressCreate');
});

//お稽古進捗画面
Route::controller(PracticeSongController::class)->middleware(['auth'])->group(function(){
    //進捗状況登録画面（登録）
    Route::post('/progress/create', 'store')->name('songStore');
    //進捗状況登録画面（完了）
    Route::post('/progress', 'done')->name('done');
});
//楽曲登録画面（管理者）
Route::controller(SongController::class)->middleware(['auth', 'admin'])->group(function(){
    Route::get('/progress/store', 'store')->name('store');
    Route::post('progress/store', 'newSong')->name('newSongStore');
    Route::post('progress/store-practice', 'newPractice')->name('newPracticeStore');
});



//希望日程確認画面
Route::get('/desire', [DesireController::class, 'desire'])->middleware('auth')->name('desire');

Route::controller(ScheduleController::class)->middleware(['auth'])->group(function(){
    //希望日程登録画面
    Route::get('/desire/create', 'desireCreate')->name('create');
    Route::post('/desire/create', 'store')->name('desireStore');
    Route::delete('/desire', 'delete')->name('absenceDelete');
});

//管理者画面
Route::middleware(['auth', 'admin'])
->group(function () {
    Route::get('/admin', [DesireController::class, 'admin'])->name('admin');
    Route::post('/admin', [AnnouncementController::class, 'store']);
});

Route::controller(ScheduleController::class)->middleware('auth')->group(function(){
    //FullCalendarイベント登録
    Route::get('/schedule-add', 'scheduleAdd')->name('schedule-add');
    Route::post('/schedule-add', 'scheduleAdd')->name('schedule-add');
    //FullCalendarイベント取得
    Route::get('/schedule-get', 'scheduleGet')->name('schedule-get');
    Route::post('/schedule-get', 'scheduleGet')->name('schedule-get');
    Route::get('/schedule-getAll', 'scheduleGetAll')->name('schedule-getAll');
    Route::post('/schedule-getAll', 'scheduleGetAll')->name('schedule-getAll');
    //FullCalendarイベント削除
    Route::get('/schedule-delete', 'scheduleDelete')->name('schedule-delete');
    Route::post('/schedule-delete', 'scheduleDelete')->name('schedule-delete');
});

//プロフィール画面
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ホーム画面
Route::get('/', [ScheduleController::class, 'countAttendance'])
->middleware(['auth', 'verified'])->name('home');
//お知らせ（管理者）
Route::controller(AnnouncementController::class)->middleware(['auth', 'verified', 'admin'])->group(function(){
    //お知らせ登録
    Route::get('/create', 'create');
    Route::post('/create', 'store')->name('announceStore');
    //お知らせ編集
    Route::get('/{announcement}', 'edit');
    Route::put('/{announcement}', 'update');
    //お知らせ削除
    Route::delete('/{announcement}', 'delete');
});


require __DIR__.'/auth.php';
