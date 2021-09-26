<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserEloquent;
use Illuminate\Support\Facades\Route;


class UserController extends Controller
{
    private $contact;




    public function __construct(UserEloquent $userEloquent)
    {
        $this->user = $userEloquent;
    }
    public function login()
    {
        return $this->user->login();
    }
    public function Register(SignupRequest $request){
        return $this->user->Register($request->all());

    }

}
