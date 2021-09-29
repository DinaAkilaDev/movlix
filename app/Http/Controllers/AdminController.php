<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Intro;
use App\Models\Movie;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showmovies(){
        $movies=Movie::all();
        return view('moviestables')->with(compact('movies'));
    }
    public function showintro(){
        $inro=Intro::all();
        return view('introstable')->with(compact('inro'));
    }
    public function showfavorite(){
        $favorite=Favorite::all();
        return view('favoritestable')->with(compact('favorite'));
    }
}
