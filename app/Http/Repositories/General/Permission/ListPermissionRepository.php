<?php

namespace App\Http\Repositories\General\Permission;

use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Permission;

class ListPermissionRepository
{
    public function get(): Collection
    {
        return Permission::all();
    }
}
