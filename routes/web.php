<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PracticeSongController;
use App\Http\Controllers\DesireController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ChatGptController;
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
Route::get('/', [ScheduleController::class, 'homeView'])
->middleware(['auth', 'verified'])->name('home');

Route::controller(SongController::class)->middleware(['auth'])->group(function(){
    //進捗状況画面
    Route::get('/progress', 'progressView')->name('progress');
    //進捗状況登録画面
    Route::get('/progress/create', 'progressCreateView');
    //曲目動画一覧画面
    Route::get('/progress/movie', 'progressMovieView')->name('movie');
});

Route::controller(PracticeSongController::class)->middleware(['auth'])->group(function(){
    //進捗状況登録画面（登録）
    Route::post('/progress/create', 'progressCreateStore')->name('songStore');
    //進捗状況登録画面（完了）
    Route::post('/progress', 'progressDone')->name('done');
});

Route::controller(PracticeSongController::class)->middleware(['auth','admin'])->group(function(){
    //曲目登録画面（管理者）
    Route::get('/progress/song', 'progressSongCreateView')->name('songSearch');
    Route::post('/progress/song', 'progressSongCreateStore')->name('newSongStore');
    Route::post('/progress/song/practice', 'progressSongPracticeStore')->name('newPracticeStore');
});

//希望日程確認画面
Route::controller(ScheduleController::class)->middleware(['auth'])->group(function(){
    Route::get('/desire', 'desireView')->name('desire');
    //希望日程登録画面
    Route::get('/desire/create', 'desireCreateView')->name('desireCreate');
    Route::post('/desire/create', 'desireCreateStore')->name('desireStore');
    Route::delete('/desire', 'delete')->name('absenceDelete');
});

//管理者画面
Route::middleware(['auth', 'admin'])
->group(function () {
    Route::get('/admin', [DesireController::class, 'adminView'])->name('admin');
    Route::post('/admin', [AnnouncementController::class, 'adminCreateStore']);
    Route::post('/admin', [DesireController::class, 'adminUserUpdate'])->name('adminUser');
    Route::get('/admin/plan', [ChatGptController::class, 'adminPlanView']);
    Route::post('/admin/plan', [ChatGptController::class, 'adminPlanCreate'])->name('planCreate');
});

Route::controller(AnnouncementController::class)->middleware('auth')->group(function(){
    //お知らせ登録
    Route::get('/admin/create', 'adminCreateView');
    // //お知らせ編集
    Route::get('/admin/{announcement}/edit', 'adminEditView');
    Route::put('/admin/{announcement}', 'adminUpdate');
    Route::delete('/admin/{announcement}', 'delete');
});

Route::controller(ScheduleController::class)->middleware('auth')->group(function(){
    //FullCalendarイベント登録
    Route::get('/schedule-add', 'scheduleAdd');
    Route::post('/schedule-add', 'scheduleAdd')->name('schedule-add');
    //FullCalendarイベント取得
    Route::get('/schedule-get', 'scheduleGet');
    Route::post('/schedule-get', 'scheduleGet')->name('schedule-get');
    Route::get('/schedule-getAll', 'scheduleGetAll');
    Route::post('/schedule-getAll', 'scheduleGetAll')->name('schedule-getAll');
    
    //FullCalendarイベント削除
    Route::get('/schedule-delete', 'scheduleDelete');
    Route::post('/schedule-delete', 'scheduleDelete')->name('schedule-delete');
});

//プロフィール画面
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
