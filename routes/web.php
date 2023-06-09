<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;

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

Route::get('/', function () {
    return view('index');
});

Route::post('/auth', [AuthController::class, 'auth'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    Route::get('/petugas', [DashboardController::class, 'petugas'])->name('dashboard.petugas');
    Route::get('/user', [DashboardController::class, 'user'])->name('dashboard.user');
    Route::get('/report', [DashboardController::class, 'report'])->name('dashboard.report');
    Route::get('/print/{id}', [ReportController::class, 'printPdf'])->name('dashboard.print');
    Route::get('/approved/{id}', [ReportController::class, 'Approved'])->name('admin.approve');
    Route::get('/rejected/{id}', [ReportController::class, 'Rejected'])->name('admin.reject');
});