<?php

namespace App\Repositories;

use App\Http\Resources\reviewResource;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewEloquent
{
    private $model;

    public function __construct(Review $review)
    {
        $this->model = $review;
    }
    public function review(){
        $page_number = intval(\request()->get('page_number'));
        $page_size = \request()->get('page_size');
        $total_records = Review::count();
        $total_pages = ceil($total_records / $page_size);
        $review = Review::skip(($page_number - 1) * $page_size)
            ->take($page_size)->get();
        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Success',
            'items' => [
                'data' => reviewResource::collection($review),
                "page_number" => $page_number,
                "total_pages" => $total_pages,
                "total_records" => $total_records,

            ]

        ];

        return response()->json($data);
    }
    public function addreviews(array $data){
        $movies=Movie::find($data['movie_id']);
        if ($movies != null){
            $reviews = new Review();
            $reviews->user_id = Auth::user()->id;
            $reviews->comment = $data['comment'];
            $reviews->movie_id = $data['movie_id'];
            $reviews->review_id = $data['review_id'];
            $reviews->save();
            $data = [
                'status' => true,
                'statusCode' => 200,
                'message' => 'Successfully Store!',
                'items' => [
                    'data' =>new reviewResource($reviews),
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
