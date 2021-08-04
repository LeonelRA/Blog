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

Route::get('/', App\Http\Controllers\HomeController::class);

Auth::routes();
Route::resource('/user', App\Http\Controllers\Auth\EditController::class)->only(['edit', 'update','destroy']);

Route::resource('/user', App\Http\Controllers\Auth\ShowController::class)->only(['index','show']);

Route::resource('/post', App\Http\Controllers\PostController::class);

Route::resource('/category', \App\Http\Controllers\Admin\CategoryController::class)->only('show');

Route::resource('/tag', \App\Http\Controllers\Admin\TagController::class)->only('show');

Route::post('/search', App\Http\Controllers\SearchController::class)->name('search');

Route::resource('/comment', App\Http\Controllers\CommentController::class)->only(['index', 'store', 'update', 'destroy']);

Route::resource('/like', App\Http\Controllers\LikeController::class)->only(['index', 'store', 'destroy']);