<?php
namespace App\Repositories;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

class UserEloquent
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function login(){
        $proxy = Request::create('oauth/token', 'POST');
        $response = Route::dispatch($proxy);
        $statusCode = $response->getStatusCode();
        $response = json_decode($response->getContent());

        if ($statusCode != 200) {
            $data = [
                'status' => false,
                'statusCode' => $statusCode,
                'message' => $response->message,
                'items' => $response,

            ];
            return response()->json($data);

        }
        $user = User::where('email', \request()->get('username'))->first();
        $data = [
            'status' => true,
            'statusCode' => $statusCode,
            'message' => 'Successfully Login!',
            'items' => [
                'token' => $response,
                'user' => $user,
            ],

        ];
        return response()->json($data);
    }


    public function Register(array $data){

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return $this->login();
    }

}
