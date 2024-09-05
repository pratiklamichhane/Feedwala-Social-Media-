<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/' , [PostController::class, 'index']);

//posts routes
Route::post('/posts/store' , [PostController::class, 'store'])->name('posts.store'); 
Route::get('posts/edit/{post}' , [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/update/{post}' , [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/delete/{post}' , [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('posts/{post}' , [PostController::class, 'show'])->name('posts.show');  

//comments routes
Route::post('comments/store' , [CommentController::class, 'store'])->name('comments.store');
Route::delete('comments/delete/{comment}' , [CommentController::class, 'destroy'])->name('comments.destroy');


Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'registerUser']);
Route::get('/login' , [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'loginUser']);
Route::post('/logout', [UserController::class, 'logout']);


//middleware auth is used to protect the route from unauthorized access
Route::get('/profile' , [UserController::class, 'profile'])->middleware('auth');
Route::get('/profile/edit' , [UserController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/update' , [UserController::class, 'update'])->name('profile.update')->middleware('auth');


