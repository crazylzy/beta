<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/home', [UserController::class, 'index'])->middleware(['auth','verified'])->name('home');


Route::get('/setting', function () {
    return view('setting');
})->middleware(['auth','verified'])->name('setting');

Route::get('profile', [ProfileController::class, 'index'])->middleware(['auth','verified'])->name('profile');
   
Route::resource('post', PostController::class);
Route::post('add_like', [PostController::class, 'add_like'])->name('post.add_like');
Route::post('add_comment', [PostController::class, 'add_comment'])->name('post.add_comment');
