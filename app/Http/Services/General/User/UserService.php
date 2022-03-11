<?php

namespace App\Http\Services\General\User;

use App\Http\Repositories\General\User\CreateUserRepository;
use App\Http\Repositories\General\User\ListUserRepository;
use App\Http\Services\BaseServiceInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService implements BaseServiceInterface
{
    public function __construct(
        private ListUserRepository $listRepository,
        private CreateUserRepository $createRepository
    ){}

    public function getEntities(): Collection
    {
        return $this->listRepository->get();
    }

    public function createEntity(): User
    {
        return $this->createRepository->save();
    }

    public function updateEntity()
    {
        // TODO: Implement updateEntity() method.
    }

    public function deleteEntity()
    {
        // TODO: Implement deleteEntity() method.
    }
}
