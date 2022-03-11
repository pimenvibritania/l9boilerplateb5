<?php

namespace App\Http\Services\General\User;

use App\Http\Repositories\General\User\CreateUserRepository;
use App\Http\Repositories\General\User\ListUserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function __construct(
        private ListUserRepository $listRepository,
        private CreateUserRepository $createRepository
    ){}

    public function getAllUser(): Collection
    {
        return $this->listRepository->get();
    }

    public function createUser(): User
    {
        return $this->createRepository->save();
    }

}
