<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PracticeSongController;
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
Route::get('/', function () {
    return view('lessons.home');
})->middleware(['auth', 'verified'])->name('home');

//進捗状況画面
Route::get('/progress', [SongController::class, 'progress'])->name('progress');
//進捗状況登録画面
// Route::get('/progress/create', [PracticeSongController::class, 'create']);
Route::get('/progress/create', [SongController::class, 'songs']);
// Route::get('/progress/create', [PracticeSongController::class, 'edit']);
// Route::put('/progress', [PracticeSongController::class, 'update']);

//進捗状況保存画面
Route::post('/progress', [PracticeSongController::class, 'store']);

//管理者画面
Route::middleware(['auth', 'admin'])
->group(function () {
    Route::get('/admin', function () {
        return view('lessons.admin');
    })->name('admin');
});
    

//FullCalendarイベント登録
Route::post('/schedule-add', [ScheduleController::class, 'scheduleAdd'])->name('schedule-add');
//FullCalendarイベント取得
Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');
//FullCalendarイベント削除
Route::post('/schedule-delete', [ScheduleController::class, 'scheduleDelete'])->name('schedule-delete');

// Route::get('/schedule/edit')

//プロフィール画面
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
