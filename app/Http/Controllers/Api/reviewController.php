<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\ReviewRequest;
use App\Repositories\ReviewEloquent;
use Illuminate\Http\Request;

class reviewController extends Controller
{
    public function __construct(ReviewEloquent $reviewEloquent)
    {
        $this->review = $reviewEloquent;
    }
    public function review(){
        return $this->review->review();
    }
    public function addreviews(ReviewRequest $request){
        return $this->review->addreviews($request->all());
    }
}
