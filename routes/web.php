<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WikbookController;

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
Route::get('/logout', [WikbookController::class, 'logout'])->name('logout');

Route::get('/', [WikbookController::class, 'index'])->name('index');
Route::get('/register', [WikbookController::class, 'register'])->name('register-page');
Route::post('/register', [WikbookController::class, 'registerAccount'])->name('register.post');
Route::get('/login', [WikbookController::class, 'login'])->name('login');
Route::post('/login', [WikbookController::class, 'auth'])->name('login.auth');

Route::get('/wikbook/', [WikbookController::class, 'home'])->name('wikbook.index');


Route::middleware('isLogin', 'CekRole:admin')->group(function () {
    Route::get('/dashboard', [WikbookController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/users', [WikbookController::class, 'users'])->name('dashboard.users');
});

Route::middleware('isLogin', 'CekRole:user')->prefix('/tampilan')->name('tampilan')->group(function () {
    Route::get('/tampilan', [WikbookController::class, 'tampilan'])->name('tampilan');
    Route::get('/dashboard/users', [WikbookController::class, 'users'])->name('dashboard.users');  
});

Route::middleware(['isLogin', 'CekRole:admin,user'])->group(function() {
    Route::get('/dashboard', [WikbookController::class, 'dashboard'])->name('dashboard');
    Route::get('/tampilan', [WikbookController::class, 'tampilan'])->name('tampilan');
    // Route::get('/dashboard/profile', [PpdbController::class, 'profile'])->name('dashboard.profile');
    // Route::get('/dashboard/profile/upload', [PpdbController::class, 'profileUpload'])->name('dashboard.profile.upload');
    // Route::patch('/dashboard/profile/change', [PpdbController::class, 'changeProfile'])->name('dashboard.profile.change');
    // Route::get('/dashboard/pembayaran', [PpdbController::class, 'pembayaran'])->name('dashboard.pembayaran');
});

