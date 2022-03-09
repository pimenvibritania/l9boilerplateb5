<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        return view('pages.general.role.index')->with('roles', Role::all());
    }

    public function create()
    {
        return $this->index();
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:roles,name",
        ]);

        Role::create($request->all());
        toast('Role created successfully', 'success');

        return redirect()->route('roles.index')
            ->withSuccess('Role created successfully');
    }

    public function show(Role $role)
    {
        return view('pages.general.role.show')->with('role', $role);
    }

    /**
     * @throws Exception
     */
    public function datatable()
    {
        $button = '<a href="%s" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>';
        return Datatables::of(Role::all())
            ->addIndexColumn()
            ->addColumn('action', function($row) use ($button) {
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);

    }
}
