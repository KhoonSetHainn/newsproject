<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;


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
Route::get('/',[NewsController::class,'index']);
Route::get('/newses', [NewsController::class,'index']);
Route::get('/newses/detail/{id}',[NewsController::class,'detail']);
Route::get('/newses/add',[NewsController::class,'add']);
Route::post('/newses/add',[NewsController::class,'create']);
Route::get('/newses/delete/{id}',[NewsController::class,'delete']);
Route::post('/comments/add',[CommentController::class,'create']);
Route::get('/comments/delete/{id}',[CommentController::class,'delete']);
Route::get('/admins',[AdminController::class,'index']);

Route::get('/admins/adminDelete/{id}',[NewsController::class,'adminDelete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



