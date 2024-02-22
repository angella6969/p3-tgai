<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\PengumumanController;
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

route::resource('pengumuman' ,PengumumanController::class)->names([
    'index' => 'pengumuman.index',
    'create' => 'pengumuman.create',
    'store' => 'pengumuman.store',
    'edit' => 'pengumuman.edit',
    'show' => 'pengumuman.show',
    'update' => 'pengumuman.update',
    'destroy' => 'pengumuman.destroy',
]);

route::resource('info' ,InfoController::class)->names([
    'index' => 'info.index',
    'create' => 'info.create',
    'store' => 'info.store',
    'edit' => 'info.edit',
    'show' => 'info.show',
    'update' => 'info.update',
    'destroy' => 'info.destroy',
]);