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


Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin', [AdminController::class,'dashboard'])->name('admin');
    Route::view('/tables', 'tables');

    Route::get('/admin/movies', [AdminController::class,'showmovies']);
    Route::get('/admin/movies/delete/{id}', [AdminController::class, 'deletemovie']);
    Route::get('/admin/movies/edit/{id}', [AdminController::class, 'editmovie']);
    Route::post('/admin/movies/edit', [AdminController::class, 'editedmovie'])->name('editmovie');
    Route::get('/admin/movies/add', [AdminController::class, 'addmovie']);
    Route::post('/admin/movies/add', [AdminController::class, 'addedmovie'])->name('addmovie');


    Route::get('/admin/users', [AdminController::class,'showusers']);
    Route::get('/admin/users/delete/{id}', [AdminController::class, 'deleteuser']);
    Route::post('/admin/users/edit', [AdminController::class, 'editeduser'])->name('edituser');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'edituser']);
    Route::get('/admin/users/add', [AdminController::class, 'adduser']);
    Route::post('/admin/users/add', [AdminController::class, 'addeduser'])->name('adduser');


    Route::get('/admin/reviews', [AdminController::class,'showreview']);
    Route::get('/admin/reviews/delete/{id}', [AdminController::class, 'deletereview']);
    Route::post('/admin/reviews/edit', [AdminController::class, 'editedreview'])->name('editreview');
    Route::get('/admin/reviews/edit/{id}', [AdminController::class, 'editreview']);
    Route::get('/admin/reviews/add', [AdminController::class, 'addreview']);
    Route::post('/admin/reviews/add', [AdminController::class, 'addedreview'])->name('addreview');


    Route::get('/admin/favorites', [AdminController::class,'showfavorites']);
    Route::get('/admin/favorites/delete/{id}', [AdminController::class, 'deletefavorite']);
    Route::post('/admin/favorites/edit', [AdminController::class, 'editedfavorite'])->name('editfavorite');
    Route::get('/admin/favorites/edit/{id}', [AdminController::class, 'editfavorite']);
    Route::get('/admin/favorites/add', [AdminController::class, 'addfavorite']);
    Route::post('/admin/favorites/add', [AdminController::class, 'addedfavorite'])->name('addfavorite');


    Route::get('/admin/intros', [AdminController::class,'showintros']);
    Route::get('/admin/intros/delete/{id}', [AdminController::class, 'deleteintro']);
    Route::post('/admin/intros/edit', [AdminController::class, 'editedintro'])->name('editintro');
    Route::get('/admin/intros/edit/{id}', [AdminController::class, 'editintro']);
    Route::get('/admin/intros/add', [AdminController::class, 'addintro']);
    Route::post('/admin/intros/add', [AdminController::class, 'addedintro'])->name('addintro');

});
