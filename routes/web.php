<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
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
    return view('layouts.home');
})->name('home');

Route::get('register',[RegisterController::class,'index'])->name('register')->middleware('guest');

Route::post('register/create',[RegisterController::class,'store'])->name('storage');

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');

Route::get('login',[LoginController::class,'index'])->name('login')->middleware('guest');

Route::post('login/store',[LoginController::class,'store'])->name('store');

Route::get('logout',[LogoutController::class,'index'])->name('logout');

Route::get('post',[PostController::class,'index'])->name('post')->middleware('auth');

Route::get('post/edit/{post:id}',[PostController::class,'edit'])->name('postedit');

Route::put('post/update/{post:id}',[PostController::class,'update'])->name('update');

Route::post('post/store', [PostController::class,'store'])->name('poststore');

Route::delete('post/{post}',[PostController::class,'destroy'])->name('postdelete');

Route::post('post/{post}/like',[PostLikeController::class,'store'])->name('post.like');

Route::delete('post/{post}/like',[PostLikeController::class,'destroy'])->name('post.delete');

Route::get('user/{user:username}/posts',[UserPostController::class,'index'])->name('user.post');

