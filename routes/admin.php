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

Route::get('/', function(){
	return view('admin');
})->name('admin');

Route::get('/post', function(){
	return view('search')->with([
		'type' => 'posts',
		'posts' => \App\Models\Post::orderBy('published_at', 'desc')->paginate(8),
	]);
})->name('admin.index');

Route::get('/user', \App\Http\Controllers\Admin\UserController::class)->name('admin.user');//arreglar

Route::resource('/category', \App\Http\Controllers\Admin\CategoryController::class)->except('show');

Route::resource('/tag', \App\Http\Controllers\Admin\TagController::class)->except('show');