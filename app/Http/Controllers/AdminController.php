<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\Favorite;
use App\Models\Intro;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/login';
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();

            \Session::put('success','You are Login successfully!!');
            return redirect()->route('dashboard');

        } else {
            return back()->with('error','your username and password are wrong.');
        }

    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        \Session::flush();
        \Sessioin::put('success','You are logout successfully');
        return redirect(route('auth.login'));
    }
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
}
