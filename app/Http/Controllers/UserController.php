<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request) : JsonResponse
    {
        // $payload = $request->validate();
        $data = $this->userRepository->index();
        return response()->json($data['data'],$data['status']);
    }
}
