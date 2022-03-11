<?php

namespace App\Http\Repositories\User;

use App\Http\Repositories\BaseRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ListUserRepository implements BaseRepositoryInterface
{
    public function getModel(): string
    {
        return User::class;
    }

    public function getAllUsers(): Collection
    {
        return User::all();
    }
}
