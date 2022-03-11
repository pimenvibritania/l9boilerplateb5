<?php

namespace App\Http\Services\User;

use App\Http\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceInterface
{
    public function __construct(public BaseRepositoryInterface $repository){}

    public function getAll(): Collection
    {
        return $this->repository->getAllUsers();
    }
}
