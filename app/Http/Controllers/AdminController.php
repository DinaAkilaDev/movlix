<?php

namespace App\Http\Controllers;

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
}
