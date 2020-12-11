<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
route::middleware('auth')->group(function () {
Route::post('/comments', 'CommentaireController@store')->name('comments.store');
Route::delete('/comments/{comment}', 'CommentaireController@destroy')->name('comments.destroy');
Route::get('posts/create', 'PostController@create');
Route::post('posts/create', 'PostController@insert');
Route::get('/posts/{id}/edit', 'PostController@edit');
Route::post('posts/{id}/update', 'PostController@update');
Route::get('posts/{id}/delete', 'PostController@delete');

});

Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@view');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
