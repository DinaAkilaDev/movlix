<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Movie\StoreRequest;
use App\Repositories\MovieEloquent;

class MovieController extends Controller
{
    public function store(StoreRequest $request)
    {
        return $this->movie->store($request->all());
    }

    public function __construct(MovieEloquent $movieEloquent)
    {
        $this->movie = $movieEloquent;
    }

    public function show()
    {
        return $this->movie->show();
    }
}
