<?php

namespace App\Http\Repositories\General\User;

use App\Models\User;
use Illuminate\Http\Request;

class CreateUserRepository
{
    public function __construct(private Request $request)
    {
    }

    public function save(): User
    {
        return User::create($this->validate());
    }

    private function validate(): array
    {
       return $this->request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }
}
