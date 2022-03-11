<?php
declare(strict_types=1);

namespace App\Http\Repositories\General\Role;

use Illuminate\Database\Eloquent\Collection;

class ListRoleRepository extends RoleRepository
{

    public function get(): Collection
    {
        return $this->model->all();
    }

    public function getWithPermission(): Collection|array
    {
        return $this->model->with('permissions')->get();
    }
}
