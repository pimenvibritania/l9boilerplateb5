<?php
declare(strict_types=1);

namespace App\Http\Repositories\General\Permission;

use Illuminate\Database\Eloquent\Collection;

class ListPermissionRepository extends PermissionRepository
{
    public function get(): Collection
    {
        return $this->model->all();
    }
}
