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

Route::get('/', function () {
    return redirect('/register96');
});

Route::group(['middleware' => ['isNotLogged']], function () {
    // Login & Register
    Route::view('/register96', 'register');
    Route::view('/login96', 'login');
    Route::post('/register96', [Users96Controller::class, 'registerHandler96']);
    Route::post('/login96', [Users96Controller::class, 'loginHandler96']);
});

Route::group(['middleware' => ['isUser']], function () {
    // dashboard user
    Route::get('/profile96', [Users96Controller::class, 'profilePage96']);

    //change Password
    Route::get('/changePassword96', [Users96Controller::class, 'editPasswordPage96']);
    Route::post('/updatePassword96', [Users96Controller::class, 'updatePassword96']);

    // edit profile user
    Route::post('/updateProfil96', [Users96Controller::class, 'updateProfil96']);
    Route::post('/uploadPhotoProfil96', [Users96Controller::class, 'uploadPhotoProfil96']);
    Route::post('/uploadPhotoKTP96', [Users96Controller::class, 'uploadPhotoKTP96']);
});

Route::group(['middleware' => ['isAdmin']], function () {
    //dashboard && detail user
    Route::get('/dashboard96', [Admin96Controller::class, 'dashboardPage96']);
    Route::get('/detail96/{id}', [Admin96Controller::class, 'detailPage96']);

    // update user
    Route::get('/update96/user/{id}/status', [Admin96Controller::class, 'updateUserStatus96']);
    Route::post('/update96/user/{id}/agama', [Admin96Controller::class, 'updateUserAgama96']);

    // CRUD AGAMA
    // Show all agama
    Route::get("/agama96", [Admin96Controller::class, "agamaPage96"]);
    // add agama
    Route::post("/agama96", [Admin96Controller::class, "createAgama96"]);
    // show edit agama & update agama
    Route::get("/agama96/{id}/edit", [Admin96Controller::class, 'editAgamaPage96']);
    Route::post("/agama96/{id}/update", [Admin96Controller::class, 'updateAgama96']);
    // delete agama
    Route::get("/agama96/{id}/delete", [Admin96Controller::class, 'deleteAgama96']);
});

Route::get('/logout96', [Users96Controller::class, 'logoutHandler96'])->middleware('isLogged');
