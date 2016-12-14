<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view("modules.admin.role.index", ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Role
     */
    public function store(Request $request)
    {
        //
        $role = new Role();
        $role->name = strtolower(str_replace('-', '',$request->input('name')));
        $role->display_name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();

        $permissions = array_map('intval', $request->input('permissions'));
        $role->attachPermissions($permissions); // check for validity

        // TODO: return user if all is successful, use this for ajax
        return $role;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::find($id);
        $permissions = Permission::lists('display_name', 'id');
        $selected_permissions = $role->perms->lists('display_name', 'id');
        return view('modules.admin.role.edit', ['role' => $role, 'permissions' => $permissions, 'selected_permissions' => $selected_permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
