<?php
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

//Student Routes
Route::get('/', [StudentsController::class, 'index']);
Route::get('/student/create', [StudentsController::class, 'create']);
Route::post('/student', [StudentsController::class, 'store']);
Route::get('/student/printView', [StudentsController::class, 'printView']);
Route::get('/student/registrant', [StudentsController::class, 'registrant']);
Route::get('/student/print/{student}', [StudentsController::class, 'print']);
// Load Ajax
Route::get('/student/loadRegistrant', [StudentsController::class, 'loadRegistrant']);
Route::post('/student/findStudent', [StudentsController::class, 'findStudent']);

// Auth Routes
Auth::routes();

// Check User Level
Route::middleware(['auth', 'userlevelcheck:super_admin'])->group(function () {
    Route::get('/users', 'UserController@index');
    Route::get('/users/edit/{user}', 'UserController@edit');
    Route::get('/users/deleted', 'UserController@deleted');
    Route::put('/users/{user}', 'UserController@update');
    Route::delete('/users/{user}', 'UserController@destroy');
    Route::post('/users/restore/', 'UserController@restore');
    Route::post('/users/permanentDelete', 'UserController@permanentDelete');
});
Route::middleware(['auth', 'userlevelcheck:admin,super_admin'])->group(function () {
    // Admin page routes
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/fetchData', 'HomeController@fetchData')->name('fetchData');
    Route::get('/edit/{student}', 'HomeController@edit');
    Route::get('users/reset', 'HomeController@reset');
    Route::get('/export', 'HomeController@export');
    Route::post('users/reset', 'HomeController@updatePass');
    Route::put('/{student}', 'HomeController@update');
    Route::delete('/{student}', 'HomeController@destroy');

    // Load ajax
    Route::get('/loadData', 'HomeController@loadData');
    Route::get('/loadStats', 'HomeController@loadStats');
});
