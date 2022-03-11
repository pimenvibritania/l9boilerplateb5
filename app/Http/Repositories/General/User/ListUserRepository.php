<?php

namespace App\Http\Repositories\General\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ListUserRepository extends UserRepository
{
    public function getModel(): string
    {
        return $this->model::class;
    }

    public function get(): Collection
    {
        return $this->model->all();
    }
}
