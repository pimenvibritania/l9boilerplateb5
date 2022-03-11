<?php
declare(strict_types=1);

namespace App\Http\Services\General\Role;

use App\Http\Repositories\General\Role\ListRoleRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\Facades\DataTables;

class RoleService implements RoleServiceInterface
{
    public function __construct(
        private ListRoleRepository $listRoleRepository
    )
    {
    }
    public function getAll(): Collection
    {
        return $this->listRoleRepository->get();
    }

    public function getWithPermission(): Collection
    {
        return $this->listRoleRepository->getWithPermission();
    }

    public function createRole()
    {
        // TODO: Implement createRoles() method.
    }

    public function updateRole()
    {
        // TODO: Implement updateRoles() method.
    }

    /**
     * @throws Exception
     */
    public function jsonDatatable()
    {
        $button = '<a href="%s" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>';

        return Datatables::of($this->getWithPermission())
            ->addIndexColumn()
            ->addColumn('action', function($row) use ($button) {
                return $button;
            })
            ->rawColumns(['action'])
            ->addColumn('permissions', function($row) {
                return $row->permissions->pluck('name')->implode(', ');
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
