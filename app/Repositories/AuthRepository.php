<?php

namespace App\Repositories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Arrays;

class AuthRepository
{
    protected User $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function login($request) : Array
    { 

        if(!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
                return [
                    'data' => [
                        'errors' => 'Invalid credentials.',
                        'body'=>null],
                    'status' => 400
                ];
            }else{
                $data = User::where('email', $request['email'])
                                ->with('userInfo')
                                ->with('roles')
                                ->first();
                return [
                    'data' => [
                        'error'=>null,
                        'body'=>$data,
                        'token' => $data->createToken('API token')->plainTextToken
                    ],
                    'status'=>200
                ];
            }
        
    }
}
