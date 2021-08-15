<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Role::paginate(20);
        return view('roles.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $role = Role::create(['name' => $request->name]);
        $permissions =$request->permissions_list;

        $role->syncPermissions($permissions);
        auth()->user()->givePermissionTo($permissions);
         auth()->user()->assignRole($role);
          flash()->success('Role added successfully');
          return redirect(route('roles.index'));
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
        $model = Role::findOrFail($id);
        return view('roles.edit', compact('model'));

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
        $role = Role::findOrFail($id);
        // $role->revokePermissionTo($permissions);
        $role->update($request->all());
        $permissions =$request->permissions_list;
        $role->syncPermissions($permissions);
        flash()->success("Role updated successfully");
        return redirect(route('roles.index'));    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        // $role->revokePermissionTo($permissions);
        $role->delete();
        $permissions =auth()->user()->getAllPermissions();;
        $role->revokePermissionTo($permissions);
        flash()->success("Role deleted successfully");
        return redirect(route('roles.index'));    
    }
}
