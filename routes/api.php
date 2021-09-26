<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\Api\IntroController;
use \App\Http\Controllers\Api\favoriteController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::post('/intro',[IntroController::class,'show']);

Route::get('/find',function (){
    $imdb = new \App\Repositories\IMDB('Northwest');
    $data = $imdb->getAll();
    dd($data);
});

Route::group(['middleware'=>'auth:api'],function (){
    Route::get('profile',[UserController::class,'profile']);
    Route::post('movie',[MovieController::class,'store']);
    Route::post('/movie-show',[MovieController::class,'show']);
    Route::post('/favorites',[favoriteController::class,'favorite']);
    Route::post('/favorite',[favoriteController::class,'addfavorites']);

});
