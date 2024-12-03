<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions=Permission::all();
        $roles=Role::all();
        return view('admin.roles.index',compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['name' =>'required']);
        Role::create($validated);
       return to_route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);

        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));


       // $permission =Permission::find($id);
       // $roles = Role::all();

        //return view('admin.permissions.edit', compact('permission','roles'));
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, role $role)
    {
        $validated=$request->validate(['name=>required']);
        $role = Role::find($role);
        $role->name = $request->name;
        $role->save();

        return to_route('admin.roles.index');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
       
        $role->delete();
  return back()->with('success', 'role deleted');
    }
    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission not exists.');
    }
}
    

