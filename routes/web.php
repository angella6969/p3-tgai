<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RekrutmenController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('content.home');
})->name('beranda');

route::get('/showpdf', [UserController::class, 'showpdf'])->name('showpdf');

route::get('/lo_gin', [UserController::class, 'index'])->middleware('guest')->name('login');
route::post('/lo_gin', [UserController::class, 'authenticate'])->name('authenticate');
route::get('/logout', [UserController::class, 'logout'])->name('logout');

route::get('/registrasi', [UserController::class, 'registrasi'])->name('registrasi');
route::post('/registrasi', [UserController::class, 'registrasiStore'])->name('registrasiStore');

// route::get('/dashboard/q', [DashboardController::class, 'index'])->name('dashboard'); 

Route::middleware(['auth'])->group(function () {

    Route::middleware(['Admin'])->group(function () {
        route::resource('/pengumuman', PengumumanController::class)->names([
            'index' => 'pengumuman.index',
            'create' => 'pengumuman.create',
            'store' => 'pengumuman.store',
            'edit' => 'pengumuman.edit',
            'show' => 'pengumuman.show',
            'update' => 'pengumuman.update',
            'destroy' => 'pengumuman.destroy',
        ]);

        route::resource('/info', InfoController::class)->names([
            'index' => 'info.index',
            'create' => 'info.create',
            'store' => 'info.store',
            'edit' => 'info.edit',
            'show' => 'info.show',
            'update' => 'info.update',
            'destroy' => 'info.destroy',
        ]);

        // route::get('/dashboard/dataRekrutmen', [DashboardController::class, 'dataRekrutmen'])->name('dashboard.dataRekrutmen');



        route::get('/dashboard/data-rekrutmen/print-pdf', [AdminController::class, 'PrintPdf'])->name('dashboard.PrintPdf');
        route::resource('/dashboard/data-rekrutmen', AdminController::class)->names([
            'index' => 'dashboard.dataRekrutmen',
            'create' => 'dashboard.dataRekrutmen.create',
            'store' => 'dashboard.dataRekrutmen.store',
            'edit' => 'dashboard.dataRekrutmen.edit',
            'show' => 'dashboard.dataRekrutmen.show',
            'update' => 'dashboard.dataRekrutmen.update',
            'destroy' => 'dashboard.dataRekrutmen.destroy',
        ]);
        route::resource('/dashboard', DashboardController::class)->names([
            'index' => 'dashboard.index',
            'create' => 'dashboard.create',
            'store' => 'dashboard.store',
            'edit' => 'dashboard.edit',
            'show' => 'dashboard.show',
            'update' => 'dashboard.update',
            'destroy' => 'dashboard.destroy',
        ]);
    });

    Route::middleware(['Rekrutmen'])->group(function () {

        // route::get('/rekrutmen', [RekrutmenController::class, 'index'])->name('dashboard-rekrutmen');
        route::get('/rekrutmen/profile-show', [RekrutmenController::class, 'profileshow'])->name('profileshow');
        route::get('/rekrutmen/profile', [RekrutmenController::class, 'profile'])->name('profile');
        route::post('/rekrutmen/profile', [RekrutmenController::class, 'saveprofile'])->name('saveprofile');
        route::resource('/rekrutmen', RekrutmenController::class)->names([
            'index' => 'rekrutmen.index',
            'create' => 'rekrutmen.create',
            'store' => 'rekrutmen.store',
            'edit' => 'rekrutmen.edit',
            'show' => 'rekrutmen.show',
            'update' => 'rekrutmen.update',
            'destroy' => 'rekrutmen.destroy',
        ]);
    });
});
