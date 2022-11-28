<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::prefix('qr-codes')->as('qrcode.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Web\QrCodeController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\Web\QrCodeController::class, 'create'])->name('create');
        Route::post('preview', [\App\Http\Controllers\Web\QrCodeController::class, 'preview'])->name('preview');
        Route::post('store', [\App\Http\Controllers\Web\QrCodeController::class, 'store'])->name('store');
        Route::get('delete/{qrcode}', [\App\Http\Controllers\Web\QrCodeController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
