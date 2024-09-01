<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/blog', [BlogController::class, 'blog']);

Route::resource('blogs', BlogController::class);
Route::post('/filter-blogs', [BlogController::class, 'filterBlogs']);




