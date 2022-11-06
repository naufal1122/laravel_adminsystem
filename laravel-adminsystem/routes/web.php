<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagement96Controller;


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
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- home dashboard ------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\Login96Controller::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\Login96Controller::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\Login96Controller::class, 'logout'])->name('logout');


// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\Register96Controller::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\Register96Controller::class, 'storeUser'])->name('register');


// ----------------------------- user profile ------------------------------//
Route::get('profile_user', [App\Http\Controllers\UserManagement96Controller::class, 'profile'])->name('profile_user');
Route::post('profile_user/store', [App\Http\Controllers\UserManagement96Controller::class, 'profileStore'])->name('profile_user/store');

// ----------------------------- user userManagement -----------------------//
Route::get('userManagement', [App\Http\Controllers\UserManagement96Controller::class, 'index'])->middleware('auth')->name('userManagement');
Route::get('user/add/new', [App\Http\Controllers\UserManagement96Controller::class, 'addNewUser'])->middleware('auth')->name('user/add/new');
Route::post('user/add/save', [App\Http\Controllers\UserManagement96Controller::class, 'addNewUserSave'])->name('user/add/save');
Route::get('view/detail/{id}', [App\Http\Controllers\UserManagement96Controller::class, 'viewDetail'])->middleware('auth');
Route::post('update', [App\Http\Controllers\UserManagement96Controller::class, 'update'])->name('update');
Route::get('delete_user/{id}', [App\Http\Controllers\UserManagement96Controller::class, 'delete'])->middleware('auth');
Route::get('activity/log', [App\Http\Controllers\UserManagement96Controller::class, 'activityLog'])->middleware('auth')->name('activity/log');
Route::get('activity/login/logout', [App\Http\Controllers\UserManagement96Controller::class, 'activityLogInLogOut'])->middleware('auth')->name('activity/login/logout');
Route::get('userTable', [App\Http\Controllers\UserManagement96Controller::class, 'userTable'])->middleware('auth');

Route::get('change/password', [App\Http\Controllers\UserManagement96Controller::class, 'changePasswordView'])->middleware('auth')->name('change/password');
Route::post('change/password/db', [App\Http\Controllers\UserManagement96Controller::class, 'changePasswordDB'])->name('change/password/db');


