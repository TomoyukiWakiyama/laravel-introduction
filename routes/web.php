<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\PersonController;
use App\Http\Middleware\HelloMiddleware;

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

// Route::get('hello', 'App\Http\Controllers\HelloController@index');
// Route::get('hello/other', 'App\Http\Controllers\HelloController@other');
// Route::get('/hello', [HelloController::class, 'index']);
// Route::get('/hello/other', [HelloController::class, 'other']);

Route::get('/hello', [HelloController::class, 'index'])->middleware(HelloMiddleware::class);
Route::post('/hello', [HelloController::class, 'post']);

/*********************************
	personの設定
*********************************/

Route::get('/person', [PersonController::class, 'index']);

Route::get('/person/find', [PersonController::class, 'find']);
Route::post('/person/find', [PersonController::class, 'search']);

Route::get('/person/add', [PersonController::class, 'add']);
Route::post('/person/add', [PersonController::class, 'create']);

Route::get('/person/calc', [PersonController::class, 'calc']);

Route::get('/person/edit', [PersonController::class, 'edit']);
Route::post('/person/edit', [PersonController::class, 'update']);

Route::get('/person/del', [PersonController::class, 'delete']);
Route::post('/person/del', [PersonController::class, 'remove']);

/*********************************
	boardの設定
*********************************/
Route::get('/board', [BoardController::class, 'index']);
Route::get('/board/add', [BoardController::class, 'add']);
Route::post('/board/add', [BoardController::class, 'create']);


