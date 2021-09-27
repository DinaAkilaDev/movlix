<?php

namespace App\Repositories;

use App\Http\Resources\movieResource;
use App\Models\Movie;
use App\Repositories\IMDB;
class MovieEloquent
{
    private $model;

    public function __construct(Movie $movie)
    {
        $this->model = $movie;
    }

    public function show()
    {
        $page_number = intval(\request()->get('page_number'));
        $page_size = \request()->get('page_size');
        $total_records = Movie::count();
        $total_pages = ceil($total_records / $page_size);
        $movie = Movie::skip(($page_number - 1) * $page_size)
            ->take($page_size)->get();
        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Success',
            'items' => [
                'data' => movieResource::collection($movie),
                "page_number" => $page_number,
                "total_pages" => $total_pages,
                "total_records" => $total_records,

            ]

        ];

        return response()->json($data);
    }

    public function store(array $data)
    {
        $name = json_encode($data);
//        dd($data);
        $item = Movie::where("name", "like", "%$name%")->first();
        if (!isset($item)) {
            $imdb = new IMDB($name);
//            imdbid`, `image`, `name`, `bio`, `year`, `languages`, `country`, `director`, `writer`, `producer`, `url`

            $imdData = $imdb->getAll();

            $mv = new Movie();
            $mv->imdbid = $imdData['getTitle']['value'];
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

        } else {
            return response()->json($item);
        }
    }

}
