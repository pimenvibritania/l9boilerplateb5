<?php

namespace App\Http\Repositories\General\User;

use App\Models\User;

class CreateUserRepository extends UserRepository
{
    public function save(): User
    {
        return $this->model->create($this->validate());
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
