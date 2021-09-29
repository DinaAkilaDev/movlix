<?php

namespace App\Http\Controllers;

use App\Models\Movie;
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
}
