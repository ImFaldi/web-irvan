<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AbsenController;

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
    //dashboard
    Route::get('/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    Route::get('/petugas', [DashboardController::class, 'petugas'])->name('dashboard.petugas');
    Route::get('/user', [DashboardController::class, 'user'])->name('dashboard.user');
    Route::get('/print/{id}', [ReportController::class, 'printPdf'])->name('dashboard.print');

    //modal Report
    Route::get('/approved/{id}', [ReportController::class, 'Approved'])->name('admin.approve');
    Route::get('/rejected/{id}', [ReportController::class, 'Rejected'])->name('admin.reject');

    //absen
    Route::post('/absent/hadir/{id}', [AbsenController::class, 'AbsentHadir'])->name('absen.hadir');
    Route::post('/absent/izin/{id}', [AbsenController::class, 'AbsentIzin'])->name('absen.izin');
    Route::post('/absent/sakit/{id}', [AbsenController::class, 'AbsentSakit'])->name('absen.sakit');

    //table
    Route::get('/table-admin', [DashboardController::class, 'adminTable'])->name('table.admin');
    Route::get('/table-petugas', [DashboardController::class, 'petugasTable'])->name('table.petugas');
});