<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showmovies(){
        $movies=Movie::all();
        return view('moviestables')->with(compact('movies'));
    }

    public function showusers(){
        $users=User::all();
        return view('userstables')->with(compact('users'));
    }
    public function showreview(){
        $reviews=Review::all();
        return view('reviewstables')->with(compact('reviews'));
    }
    public function showfavorites(){
        $favorite=Favorite::all();
        return view('favoritestable')->with(compact('favorite'));
    }
}
