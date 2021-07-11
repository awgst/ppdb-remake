<?php

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
    return view('index');
});
Route::get('/login', function(){
	return view('login');
});
Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/create', [StudentController::class, 'create']);
Route::post('/student', [StudentController::class, 'store']);
Route::get('/student/print', [StudentController::class, 'printView']);
