<?php
declare(strict_types=1);

namespace App\Http\Services\General\Role;

use App\Http\Repositories\General\Role\ListRoleRepository;
use App\Http\Services\BaseServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\Facades\DataTables;

class RoleService implements BaseServiceInterface
{
    public function __construct(private ListRoleRepository $listRoleRepository){}

    public function getWithPermission(): Collection
    {
        return $this->listRoleRepository->getWithPermission();
    }

    public function getEntities(): Collection
    {
        return $this->listRoleRepository->get();
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

    /**
     * @throws Exception
     */
    public function getJsonDatatable()
    {
        $button = '<a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>';

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
