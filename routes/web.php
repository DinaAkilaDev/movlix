<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\AdminController;
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


Route::view('/', 'welcome');
Auth::routes();

Route::get('/admin/login', [LoginController::class,'showAdminLoginForm']);
Route::get('/admin/register', [RegisterController::class,'showAdminRegisterForm']);

Route::post('/admin/login', [LoginController::class,'adminLogin']);
Route::post('/admin/register', [RegisterController::class,'createAdmin']);


Route::view('/home', 'home')->middleware('auth');


//Route::group(['middleware' => 'auth'], function () {
//
    Route::view('/admin', 'admin');
    Route::view('/tables', 'tables');

    Route::get('/admin/movies', [AdminController::class,'showmovies']);
    Route::get('/admin/movies/delete/{id}', [AdminController::class, 'deletemovie']);
    Route::get('/admin/movies/edit/{id}', [AdminController::class, 'editmovie']);
    Route::post('/admin/movies/edit', [AdminController::class, 'editedmovie'])->name('editmovie');

    Route::get('/admin/users', [AdminController::class,'showusers']);
    Route::get('/admin/users/delete/{id}', [AdminController::class, 'deleteuser']);

    Route::get('/admin/reviews', [AdminController::class,'showreview']);
    Route::get('/admin/reviews/delete/{id}', [AdminController::class, 'deletereview']);

    Route::get('/admin/favorites', [AdminController::class,'showfavorites']);
    Route::get('/admin/favorites/delete/{id}', [AdminController::class, 'deletefavorite']);

    Route::get('/admin/intros', [AdminController::class,'showintros']);
    Route::get('/admin/intros/delete/{id}', [AdminController::class, 'deleteintro']);
//});
