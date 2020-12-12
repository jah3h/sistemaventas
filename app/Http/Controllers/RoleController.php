<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Role::class);
        $roles= Role::with('permissions')->get();
        
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $this->authorize('create');
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $this->authorize('create');
        $validated=$request->validated();
        $role = Role::create($request->validated());
        $role->syncPermissions($validated['permisos']);
        return view('roles.index')->with('success','El rol se ha creado correctamente.');;
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
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update');
        $lstPermisos = array();

        foreach($role->permissions as $p){
            $lstPermisos[$p->name]=$p->name;
        }

        return view('roles.edit',['role'=>$role,'lstPermisos'=>$lstPermisos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->authorize('update');
        $validated=$request->validated();
        $role->update($validated);
        $role->syncPermissions($validated['permisos']);
        return view('roles.index')->with('success','El rol se ha actualizado correctamente.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete');
        if($role->users()->exists()){
            return redirect()->route('roles.index')->with('error','El rol tiene una relación dependiente.');
        }else{
        $role->delete();
            return redirect()->route('roles.index')->with('success','El rol se ha eliminado correctamente.');
        }
    }
}
