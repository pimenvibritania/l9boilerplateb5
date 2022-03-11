<?php

namespace App\Http\Services\General\Permission;

use App\Http\Repositories\General\Permission\ListPermissionRepository;

class PermissionService implements PermissionServiceInterface
{
    public function __construct(private ListPermissionRepository $listPermissionRepository){}

    public function getAll()
    {
        return $this->listPermissionRepository->get();
    }
}
