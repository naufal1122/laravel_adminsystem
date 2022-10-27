<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\LoginController;

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
Route::resource('penduduk', PendudukController::class);
Route::get('/datapenduduk', [PendudukController::class, 'tabel']);

// Login
Route::get('/registeruserbaru', [LoginController::class, 'registeruserbaru']);
Route::post('/prosesregisteruserbaru', [LoginController::class, 'prosesregisteruserbaru']);
Route::get('/loginuserbaru', [LoginController::class, 'loginuserbaru']);
Route::post('/prosesloginuserbaru', [LoginController::class, 'prosesloginuserbaru']);
Route::get('/logoutuserbaru', [LoginController::class, 'logoutuserbaru']);
