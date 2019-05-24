<?php

namespace App\Http\Controllers\Base;

use App\Repositories\Base\UserRepository;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function myMs()
    {
        $users = $this->userRepository->find(getUser()->user_id);

        return responseSuccess([
            'id' => $users->id,
            'user_no' => $users->user_no,
            'name' => $users->user_name,
            'photo' => $users->photo,
            'gender' => $users->gender,
            'status' => $users->status,
        ]);
    }
}
