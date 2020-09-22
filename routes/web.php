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
Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', 'App\Http\Controllers\PostsController@home')->middleware('auth');;
Route::post('/home/insert', 'App\Http\Controllers\PostsController@insert')->middleware('auth');;
Route::get('/home/{post}', 'App\Http\Controllers\PostsController@view')->middleware('auth');;
Route::post('/home/{post}/update', 'App\Http\Controllers\PostsController@update')->middleware('auth');;
Route::post('/comment/{post}', 'App\Http\Controllers\CommentsController@insert')->middleware('auth');;
Route::get('/comment/{comment}/delete', 'App\Http\Controllers\CommentsController@delete')->middleware('auth');; //dovrebbe essere post

Auth::routes();

