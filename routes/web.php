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

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin')->middleware('auth');
Route::resource('/carousels', App\Http\Controllers\CarouselController::class)->middleware('auth');
Route::resource('/teams', App\Http\Controllers\TeamController::class)->middleware('auth');
Route::resource('/posts', App\Http\Controllers\PostController::class);
Route::resource('/posts/{post}/comments', App\Http\Controllers\CommentController::class);
Route::resource('/posts/{post}/comments/{comment}/comment2s', App\Http\Controllers\Comment2Controller::class);

Route::get('/trevi', [App\Http\Controllers\FrontController::class, 'index'])->name('blog');
Route::get('/trevi/blog/{id}', [App\Http\Controllers\FrontController::class, 'single'])->name('blog.single');



