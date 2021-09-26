<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Crew;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function store(Request $request){
        $name=$request->name;
        $item = Movie::where("name","like","%$name%")->first();
        if (!isset($item))
        {
            //

            $imdb = new \App\Repositories\IMDB($name);


//            imdbid`, `image`, `name`, `bio`, `year`, `languages`, `country`, `director`, `writer`, `producer`, `url`

            $imdData = $imdb->getAll();
            $mv = new Movie();
            $mv->imdbid = $imdData['getId']['value'];
            $mv->image = $imdData['getPoster']['value'];
            $mv->name = $imdData['getAka']['value'];
            $mv->bio = $imdData['getDescription']['value'];
            $mv->year = $imdData['getYear']['value'];
            $mv->languages = $imdData['getLanguage']['value'];
            $mv->country = $imdData['getCountry']['value'];
            $mv->director = $imdData['getDirector']['value'];
            $mv->writer = $imdData['getWriter']['value'];
            $mv->producer = $imdData['getCreator']['value'];
            $mv->url = $imdData['getUrl']['value'];
            $mv->cast = $imdData['getCast']['value'];
            $mv->save();



            $data = [
                'status' => true,
                'statusCode' => 200,
                'message' => 'Successfully Store!',
                'items' => [
                    'movie' => $mv,
                ],

            ];
            return response()->json($data);

        } else{
            return response()->json($item);
        }

    }
}
