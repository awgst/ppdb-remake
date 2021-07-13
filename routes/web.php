<?php
use App\Http\Controllers\StudentsController;
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
Route::get('/student', [StudentsController::class, 'index']);
Route::get('/student/create', [StudentsController::class, 'create']);
Route::post('/student', [StudentsController::class, 'store']);
Route::get('/student/printView', [StudentsController::class, 'printView']);
Route::get('/student/registrant', [StudentsController::class, 'registrant']);
// Load Ajax
Route::get('/student/loadRegistrant', [StudentsController::class, 'loadRegistrant']);
Route::post('/student/findStudent', [StudentsController::class, 'findStudent']);

