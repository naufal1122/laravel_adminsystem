<?php

use App\Http\Controllers\Admin96Controller;
use App\Http\Controllers\Users96Controller;
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

//welcome page
Route::get('/', function () {
    return redirect('/login96');
});

Route::group(['middleware' => ['isNotLogged']], function () {
    // Register Login
    Route::view('/register96', 'register');
    Route::view('/login96', 'login');
    Route::post('/register96', [App\Http\Controllers\Register96Controller::class, 'register96']);
    Route::post('/login96', [App\Http\Controllers\Login96Controller::class, 'login96']);
});

Route::group(['middleware' => ['isAdmin']], function () {
    // Welcome

    // Detail User
    Route::get('/dashboard96', [Admin96Controller::class, 'dashboardPage96']);
    Route::get('/detail96/{id}', [Admin96Controller::class, 'detailPage96']);

    // Update User
    Route::get('/update96/user/{id}/status', [Admin96Controller::class, 'updateUserStatus96']);
    Route::post('/update96/user/{id}/agama', [Admin96Controller::class, 'updateUserAgama96']);

    // Delete User
    Route::post('/delete96/user/{id}', [Admin96Controller::class, 'deleteUser96']);


    // CRUD AGAMA
    Route::get("/agama96", [Admin96Controller::class, "agamaPage96"]);
    // Tambah Agama
    Route::post("/agama96", [Admin96Controller::class, "createAgama96"]);
    // Show Agama Menu
    Route::get("/agama96/{id}/edit", [Admin96Controller::class, 'editAgamaPage96']);
    Route::post("/agama96/{id}/update", [Admin96Controller::class, 'updateAgama96']);
    // Delete Data Agama
    Route::get("/agama96/{id}/delete", [Admin96Controller::class, 'deleteAgama96']);
});

Route::group(['middleware' => ['isUser']], function () {
    // Welcome

    // Dashboard
    Route::get('/profile96', [Users96Controller::class, 'profilePage96']);

    // Edit password
    Route::get('/changePassword96', [Users96Controller::class, 'editPasswordPage96']);
    Route::post('/updatePassword96', [Users96Controller::class, 'updatePassword96']);

    // Edit user profile
    Route::post('/updateProfil96', [Users96Controller::class, 'updateProfil96']);
    Route::post('/uploadPhotoProfil96', [Users96Controller::class, 'uploadPhotoProfil96']);
    Route::post('/uploadPhotoKTP96', [Users96Controller::class, 'uploadPhotoKTP96']);

});

// Welcome Page
Route::get('/welcome96', [App\Http\Controllers\Welcome96Controller::class, 'welcomePage96']);

// Logout Session
Route::get('/logout96', [Users96Controller::class, 'logout96'])->middleware('isLogged');
