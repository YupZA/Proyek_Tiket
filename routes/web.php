<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SeminarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/buyer', [BuyerController::class, 'index']);
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard2.index');
    Route::get('/data-pengguna', [DashboardController::class, 'showDataPengguna'])->name('dashboard2.showDataPengguna')->middleware('admin');
});

Route::get('/infoBuyTicket', [SeminarController::class, 'index'])->name('infoBuyTicket');

Route::get('/myTicket', [SeminarController::class, 'index2'])->name('myTicket');

Route::get('/buyTicket/', [SeminarController::class, 'index1'])->name('buyTicket');

Route::get('/infoMyTicket', [SeminarController::class, 'index3'])->name('infoMyTicket');

Route::get('/dashboard', [SeminarController::class, 'index4'])->name('dashboard');
