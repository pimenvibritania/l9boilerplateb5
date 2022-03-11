<?php

namespace App\Http\Repositories\General\User;

use App\Models\User;
use Illuminate\Http\Request;

abstract class UserRepository
{
    public function __construct(
        public User $model,
        public Request $request
    ){}
}
