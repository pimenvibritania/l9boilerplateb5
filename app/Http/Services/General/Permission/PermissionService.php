<?php
declare(strict_types=1);

namespace App\Http\Services\General\Permission;

use App\Http\Repositories\General\Permission\ListPermissionRepository;
use App\Http\Services\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class PermissionService implements BaseServiceInterface
{
    public function __construct(private ListPermissionRepository $listPermissionRepository){}

    public function getEntities(): Collection
    {
        return $this->listPermissionRepository->get();
    }

    public function createEntity()
    {
        // TODO: Implement createEntity() method.
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
