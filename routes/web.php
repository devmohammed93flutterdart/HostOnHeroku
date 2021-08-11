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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');

Route::get('/post/trashed', [App\Http\Controllers\PostController::class, 'postsTrashed'])->name('posts.trashed');

Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');

Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');

Route::get('/post/show/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::get('/post/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');

Route::put('/post/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

Route::get('/post/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');

Route::get('/post/hdelete/{id}', [App\Http\Controllers\PostController::class, 'hdelete'])->name('post.hdelete');

Route::get('/post/restore/{id}', [App\Http\Controllers\PostController::class, 'restore'])->name('post.restore');




Route::get('/results', [App\Http\Controllers\ResultController::class, 'index'])->name('results');

Route::get('/result/trashed', [App\Http\Controllers\ResultController::class, 'resultsTrashed'])->name('results.trashed');

Route::get('/result/create', [App\Http\Controllers\ResultController::class, 'create'])->name('result.create');

Route::post('/result/store', [App\Http\Controllers\ResultController::class, 'store'])->name('result.store');

Route::get('/result/show/{slug}', [App\Http\Controllers\ResultController::class, 'show'])->name('result.show');

Route::get('/result/edit/{id}', [App\Http\Controllers\ResultController::class, 'edit'])->name('result.edit');

Route::put('/result/update/{id}', [App\Http\Controllers\ResultController::class, 'update'])->name('result.update');

Route::get('/result/destroy/{id}', [App\Http\Controllers\ResultController::class, 'destroy'])->name('result.destroy');

Route::get('/result/hdelete/{id}', [App\Http\Controllers\ResultController::class, 'hdelete'])->name('result.hdelete');

Route::get('/result/restore/{id}', [App\Http\Controllers\ResultController::class, 'restore'])->name('result.restore');