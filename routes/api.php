<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\Api\IntroController;
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



Route::post('/register',[UserController::class,'Register']);
Route::post('/login',[UserController::class,'login']);
Route::post('/intro',[IntroController::class,'show']);

Route::get('/find',function (){
    $imdb = new \App\Repositories\IMDB('A Hijacking');
    $data = $imdb->getAll();
    dd($data);
});

Route::group(['middleware'=>'auth:api'],function (){
    Route::post('movie',[MovieController::class,'store']);
    Route::post('/movie-show',[MovieController::class,'show']);

});
