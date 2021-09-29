<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showmovies(){
        $movies=Movie::all();
        return view('moviestable')->with(compact('movies'));
    }
}
