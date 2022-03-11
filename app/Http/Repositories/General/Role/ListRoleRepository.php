<?php
declare(strict_types=1);

namespace App\Http\Repositories\General\Role;

use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;

class ListRoleRepository
{

    public function get(): Collection
    {
        return Role::all();
    }

    public function getWithPermission(): Collection|array
    {
        return Role::with('permissions')->get();
    }
}
