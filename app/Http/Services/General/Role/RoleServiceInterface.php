<?php

namespace App\Http\Services\General\Role;

interface RoleServiceInterface
{
    public function getAll();
    public function createRole();
    public function updateRole();
}
