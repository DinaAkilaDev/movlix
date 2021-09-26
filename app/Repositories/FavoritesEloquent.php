<?php

namespace App\Repositories;

use App\Http\Resources\favoritesResource;
use App\Models\Favorite;

class FavoritesEloquent
{
public function favorite(){
    $page_number = intval( \request()->get('page_number'));
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
}
