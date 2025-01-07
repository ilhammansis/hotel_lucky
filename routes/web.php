<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\RiviewController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PembayaranController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
Route::resource('kamar',KamarController::class);
Route::resource('tipekamar', TipeKamarController::class);
Route::resource('riview', RiviewController::class);
Route::resource('booking', BookingController::class);
Route::resource('pembayaran', PembayaranController::class);
Route::resource('user', UserController::class);
Route::resource('transaksi', TransaksiController::class);
});
