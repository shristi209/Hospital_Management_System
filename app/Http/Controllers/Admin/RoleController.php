<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    protected $role, $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role=$role;
        $this->permission=$permission;
        $this->middleware('permission:create role', ['only'=>['create', 'store']]);
        $this->middleware('permission:view role', ['only'=>['index']]);
        $this->middleware('permission:edit role', ['only'=>['edit', 'update']]);
    }
    public function index()
    {
        $roles = $this->role->get();
        return view('admin.roles.index', compact('roles'));
    }
    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $role=$request->validate([
            'name'=>'string',
        ]);
        $this->role->create($role);
        return redirect()->route('role.index')->with('message', 'Successfully Created Role');
    }

    public function edit($id)
    {
        $permissions=$this->permission->all();
        $role=$this->role->findOrFail($id);
        return view('admin.Roles.rolewpermission', compact('permissions', 'role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'permission.*'=>'required',
        ]);
        $role=$this->role->findOrFail($id);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('message', 'Assigned permission to roles');
    }


}
