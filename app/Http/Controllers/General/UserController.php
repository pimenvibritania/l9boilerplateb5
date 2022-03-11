<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserServiceInterface $userService){}

    public function index()
    {
        $users = $this->userService->getAll();

        return view('pages.general.user.index')
            ->with(['users' => $users]);
    }
}
