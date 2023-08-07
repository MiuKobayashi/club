<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
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



/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

//ホーム画面
Route::get('/', function () {
    return view('lessons.home');
})->middleware(['auth', 'verified'])->name('home');

//進捗状況画面
Route::get('/progress', function () {
    return view('lessons.progress');
})->name('progress');

//管理者画面
Route::get('/admin', function () {
    return view('lessons.admin');
})->name('admin');

//fullCalendarイベント登録
Route::post('/schedule-add', [ScheduleController::class, 'scheduleAdd'])->name('schedule-add');
//fullCalendarイベント取得
Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');

//プロフィール画面
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
