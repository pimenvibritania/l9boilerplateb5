<?php

namespace App\Http\Repositories\General\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ListUserRepository
{
    public function getModel(): string
    {
        return User::class;
    }

    public function get(): Collection
    {
        return User::all();
    }
}
