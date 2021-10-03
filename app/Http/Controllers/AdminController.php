<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Intro;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use \App\Models\User;

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
    public function showintros(){
        $intro=Intro::all();
        return view('introstable')->with(compact('intro'));
    }
    public function dashboard()
    {
        return view('admin');
    }
    public function deletemovie($id){
        $movie= Movie::find($id);
        $movie->destroy($id);
        return Redirect::back();
    }
    public function deleteintro($id){
        $intro= Intro::find($id);
        $intro->destroy($id);
        return Redirect::back();
    }
    public function deletefavorite($id){
        $favorite= Favorite::find($id);
        $favorite->destroy($id);
        return Redirect::back();
    }
    public function deletereview($id){
        $review= Review::find($id);
        $review->destroy($id);
        return Redirect::back();
    }
    public function deleteuser($id){
        $user= User::find($id);
        $user->destroy($id);
        return Redirect::back();
    }
    public function editmovie($id)
    {
        $movies = Movie::find($id);
        return view('editmovie')->with(compact('movies'));
    }

    public function editedmovie(Request $request)
    {
        $id=$request->input('id');
        $movie = Movie::find($id);
        $movie->imdbid = $request->input('imdbid');
        $movie->image = $request->input('image');
        $movie->name = $request->input('name');
        $movie->bio = $request->input('bio');
        $movie->year = $request->input('year');
        $movie->languages = $request->input('languages');
        $movie->country = $request->input('country');
        $movie->director = $request->input('director');
        $movie->writer = $request->input('writer');
        $movie->producer = $request->input('producer');
        $movie->url = $request->input('url');
        $movie->cast = $request->input('cast');
        $movie->save();
        return Redirect::back()->withErrors(['Edited Successfully', 'The Message']);
    }

    public function editintro($id)
    {
        $intros = Intro::find($id);
        return view('editintro')->with(compact('intros'));
    }

    public function editedintro(Request $request)
    {

        $id=$request->input('id');
        $intros = Intro::find($id);
        $intros->image = $request->input('image');
        $intros->bio = $request->input('bio');
        $intros->save();
        return Redirect::back()->withErrors(['Edited Successfully', 'The Message']);
    }

    public function edituser($id)
    {
        $users = User::find($id);
        return view('edituser')->with(compact('users'));
    }

    public function editeduser(Request $request)
    {

        $id=$request->input('id');
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->save();
        return Redirect::back()->withErrors(['Edited Successfully', 'The Message']);
    }
    public function editfavorite($id)
    {
        $favorites = Favorite::find($id);
        return view('editfavorite')->with(compact('favorites'));
    }

    public function editedfavorite(Request $request)
    {

        $id=$request->input('id');
        $favorites = Favorite::find($id);
        $favorites->user_id = $request->input('user_id');
        $favorites->movie_id = $request->input('movie_id');
        $favorites->save();
        return Redirect::back()->withErrors(['Edited Successfully', 'The Message']);
    }
    public function editreview($id)
    {
        $reviews = Review::find($id);
        return view('editreview')->with(compact('reviews'));
    }

    public function editedreview(Request $request)
    {
        $id=$request->input('id');
        $reviews = Review::find($id);
        $reviews->user_id = $request->input('user_id');
        $reviews->comment = $request->input('comment');
        $reviews->movie_id = $request->input('movie_id');
        $reviews->review_id = $request->input('review_id');
        $reviews->save();
        return Redirect::back()->withErrors(['Edited Successfully', 'The Message']);
    }
    public function addreview(){
        return view('addreview');
    }
    public function addedreview(Request $request){
        $review = new Review();
        $review->user_id = $request->input('user_id');
        $review->comment = $request->input('comment');
        $review->movie_id = $request->input('movie_id');
        $review->review_id = $request->input('review_id');
        $review->save();
        return Redirect::back()->withErrors(['Added Successfully', 'The Message']);
    }

}
