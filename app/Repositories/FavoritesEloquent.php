<?php

namespace App\Repositories;

use App\Http\Resources\favoritesResource;
use App\Models\Favorite;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class FavoritesEloquent
{
    public function favorite()
    {
        $page_number = intval(\request()->get('page_number'));
        $page_size = \request()->get('page_size');
        $total_records = Favorite::count();
        $total_pages = ceil($total_records / $page_size);
        $favorite = Favorite::skip(($page_number - 1) * $page_size)
            ->take($page_size)->get();
        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Success',
            'items' => [
                'data' => favoritesResource::collection($favorite),
                "page_number" => $page_number,
                "total_pages" => $total_pages,
                "total_records" => $total_records,

            ]

        ];

        return response()->json($data);
    }
    public function addfavorites(array $data){
        $movies=Movie::find($data['movie_id']);
        if ($movies != null){
        $favorite = new Favorite();
        $favorite->user_id = Auth::user()->id;
        $favorite->movie_id = $data['movie_id'];
        $favorite->save();
        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Successfully Store!',
            'items' => [
                'data' =>new favoritesResource($favorite),
            ],

        ];
        return response()->json($data);
        }
        else{
            $data = [
                'status' => false,
                'statusCode' => 500,
                'message' => 'There is no movie with this id!',
                'items' => '',

            ];
            return response()->json($data);
        }
    }
}
