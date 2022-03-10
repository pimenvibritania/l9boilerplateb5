<?php
declare(strict_types=1);

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class RoleController
 * @package App\Http\Controllers\General
 * @author pimenvibritania@gmail.com
 */
class RoleController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('pages.general.role.index')
            ->with('roles', Role::all())
            ->with('permissions', Permission::all());
    }

    /**
     * @return View
     */
    public function create() : View
    {
        return $this->index();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            "name" => "required|unique:roles,name",
            "permissions" => "required|array",
        ]);

        (Role::create($request->all()))
            ->syncPermissions($request->get('permissions'));

        return redirect()->route('roles.index')
            ->withSuccess('Role created successfully');
    }

    /**
     * @param Role $role
     * @return View
     */
    public function show(Role $role): View
    {
        return view('pages.general.role.show')->with('role', $role);
    }

    /**
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function datatable(): JsonResponse
    {
        $button = '<a href="%s" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>';

        return Datatables::of(Role::with('permissions')->get())
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
