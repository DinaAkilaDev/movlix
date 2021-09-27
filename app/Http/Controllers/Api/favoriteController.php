<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Favorite\StoreRequest;
use App\Repositories\FavoritesEloquent;
use App\Repositories\IntroEloquent;
use Illuminate\Http\Request;

class favoriteController extends Controller
{
    private $contact;

    public function __construct(FavoritesEloquent $favoritesEloquent)
    {
        $this->favorite = $favoritesEloquent;
    }
    public function favorite(){
        return $this->favorite->favorite();
    }
    public function addfavorites(StoreRequest $request){
        return $this->favorite->addfavorites($request->all());
    }
}
