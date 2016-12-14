<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

// TODO: need to perform form validation the laravel way
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view("modules.admin.user.index", ['users' => $users]);

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
     * @return User
     */
    public function store(Request $request)
    {
        //

//        TODO: Create a remember token or user the authenticable
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email'); // TODO: check if email exists
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $roles = array_map('intval', $request->input('role'));
        $user->attachRoles($roles); // check for validity

        // TODO: return user if all is successful, use this for ajax
        return $user;


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
        $user = User::findOrfail($id);

        $roles = Role::lists('display_name', 'id');

        $selected_roles = $user->roles->lists('display_name', 'id');

        return view('modules.admin.user.edit', ['user' => $user, 'roles' => $roles, 'selected_roles' => $selected_roles]);
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
