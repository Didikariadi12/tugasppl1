<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BandingkanWaktuController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/loginUser', [LoginController::class, 'loginUser'])->name('login-user');

Route::get('/akar', [AkarController::class, 'index'])->name('akar-kuadrat-index')->middleware('auth');
Route::post('hitung/akar/kuadrat', [AkarController::class, 'hitung'])->name('hitung-akar-kuadratAPI');
Route::post('hitung/akar/plsql', [AkarController::class, 'hitungPLSQL'])->name('hitung-akar-kuadratPLSQL');



//register
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/registerUser', [RegisterController::class, 'registerUser'])->name('register-user');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route::get('/bandingkan', [AkarController::class, 'hitung'])->name('bandingkan');

Route::get('/bandingkan-waktu', [BandingkanWaktuController::class, 'index'])->name('bandingkan-waktu');





