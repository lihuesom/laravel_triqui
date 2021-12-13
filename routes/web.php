<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
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

Route::get('/', [BoardController::class, 'index']);
Route::match(['get', 'post'], '/join', [BoardController::class, 'join']);
Route::match(['get', 'post'], '/create', [BoardController::class, 'create']);
Route::get('/board/{id}', [BoardController::class, 'board']);


Route::get('/list', [BoardController::class, 'listBoards']);
