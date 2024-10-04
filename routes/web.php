<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', [ PostController::class, 'main']);

Route::get('/test', [ PostController::class, 'index']);
Route::get('/userform', [ PostController::class, 'usershow']);
Route::get('/getall', [ PostController::class, 'alluserget']);
Route::post('/add/user', [ PostController::class, 'adduser'])->name('adduser');

Route::get('showpost', [ PostController::class, 'postshow' ])->name('postshow');
Route::post('/add/post', [ PostController::class, 'addpost'])->name('addpost');

Route::get('showcomment/{id}', [ PostController::class, 'viewshowcomment']);
Route::get('getallcomment', [ PostController::class, 'allcomment']);
Route::post('addcomment', [ PostController::class, 'addcomment'])->name('addComment');
Route::delete('/users/{id}', [ PostController::class, 'destroy'])->name('users.destroy');
Route::get('/search-posts', [ PostController::class, 'search'])->name('searchPosts');
Route::get('viewallcomment/{id}', [ PostController::class, 'allcommentlisting']);
Route::get('/blogview/{id}',[PostController::class , 'blogview'])->name('blog');






