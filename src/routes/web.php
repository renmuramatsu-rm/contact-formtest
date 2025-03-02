<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\ExportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ContactController::class, 'index']);
Route::post('/back', [ContactController::class, 'back'])->name('back');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/contacts', [ContactController::class, 'store']);
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'index'])->name('admin');
});
Route::get('/admin/search', [AuthController::class, 'search']);
Route::get('/modal', [ModalController::class, 'modal']);
Route::get('/admin/export', [ExportController::class, 'csvexport'])->name('admin.export');
