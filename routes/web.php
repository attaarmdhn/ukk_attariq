<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KomentarController;
use App\Models\Komentar;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [GuestController::class,'index'])->name('guest');



Route::middleware(['guest'])->group(function () {
   Route::get('/login', [AuthController::class, 'index'])->name('login');
   Route::get('/register', [AuthController::class, 'register'])->name('register');
   Route::post('/login/post', [AuthController::class, 'login'])->name('login.post');
   Route::post('/register/post', [AuthController::class, 'registerpost'])->name('register.post');
});


Route::middleware(['auth'])->group(function () {
    // Index
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Album
    Route::get('/album', [AlbumController::class,'index'])->name('album');
    Route::post('/album/post', [AlbumController::class,'post'])->name('album.post');
    Route::get('/album/sort/{id}', [AlbumController::class, 'sort'])->name('album.sort');

    // Photo
    Route::get('/foto', [FotoController::class, 'index'])->name('foto');
    Route::post('/foto/post', [FotoController::class, 'post'])->name('foto.post');
    Route::post('/like/{id}', [FotoController::class, 'like'])->name('like');
    Route::delete('/foto/{id}', [FotoController::class, 'destroy'])->name('foto.destroy');

    // Comments
    Route::get('/comments/{id}', [KomentarController::class, 'index'])->name('komentar');
    Route::post('/comments/post/{id}', [KomentarController::class, 'post'])->name('komentar.post');

});

