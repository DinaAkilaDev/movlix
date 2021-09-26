<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
