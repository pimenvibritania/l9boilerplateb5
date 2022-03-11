<?php

namespace App\Http\Repositories\General\Role;

use Spatie\Permission\Models\Role;

abstract class RoleRepository
{
    public function __construct(public Role $model){}
}
