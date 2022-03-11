<?php
declare(strict_types=1);

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Services\General\Permission\PermissionService;
use App\Http\Services\General\Role\RoleService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

/**
 * Class RoleController
 * @package App\Http\Controllers\General
 * @author pimenvibritania@gmail.com
 */
class RoleController extends Controller
{
    public function __construct(
        private RoleService $roleService,
        private PermissionService $permissionService
    ){}

    /**
     * @return View
     */
    public function index(): View
    {
        $roles = $this->roleService->getEntities();
        $permissions = $this->permissionService->getEntities();

        return view('pages.general.role.index', compact('roles', 'permissions'));
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
       return $this->roleService->getJsonDatatable();
    }
}
