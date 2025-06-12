<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected User $userModel;
    
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function index() : Array
    {
        $data = $this->userModel->get();
        return [
            'data'=>[
                'body'=>$data
            ],
            'status'=>200
        ];

    }
}
