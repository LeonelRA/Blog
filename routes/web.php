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
Route::resource('/user', App\Http\Controllers\UserController::class)->only(['edit', 'update']);

Route::resource('/post', App\Http\Controllers\PostController::class);

Route::get('/categories/{category:name}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
Route::get('/tags/{tag:name}', [App\Http\Controllers\TagController::class, 'show'])->name('tag.show');

Route::post('/search', App\Http\Controllers\SearchController::class)->name('search');

Route::resource('/comment', App\Http\Controllers\CommentController::class)->only(['store', 'edit', 'destroy']);

Route::resource('/like', App\Http\Controllers\LikeController::class)->only(['store', 'destroy']);

