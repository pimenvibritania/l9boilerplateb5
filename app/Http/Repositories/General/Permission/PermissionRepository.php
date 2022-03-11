<?php

namespace App\Http\Repositories\General\Permission;

use Spatie\Permission\Models\Permission;

abstract class PermissionRepository
{
    public function __construct(public Permission $model){}
}
