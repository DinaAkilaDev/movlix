<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\introResource;
use App\Models\Intro;
use App\Repositories\IntroEloquent;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    private $contact;

    public function __construct(IntroEloquent $introEloquent)
    {
        $this->intro = $introEloquent;
    }
    public function show(){
        return $this->intro->show();
    }
}
