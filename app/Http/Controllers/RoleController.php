<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('code', 'asc')->paginate(5);

        return view('roles.index')->with([
            'roles' => $roles,
        ]);
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

        $validatedData = $request->validate([
            'code' => ['required', 'numeric', 'digits_between: 1 , 2', 'unique:roles'],
            'name' => ['required', 'min:3', 'max:20', 'unique:roles'],
        ]);

        $role = new Role();
        $role->code =  $request->input(['code']);
        $role->name =  $request->input(['name']);
        if ($role->save()) {
            return Redirect::route('roles.index')->with([
                'success' => 'El rol se ha creado correctamente',
            ]);
        } else {
            return view('roles.create')->with([
                'error' => 'Ha ocurrido un error al crear el rol, intente nuevamente',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show')->with([
            'role' => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit')->with([
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'code' => ['required', 'numeric', 'digits_between: 1 , 2', 'unique:roles,code,'.$role->id],
            'name' => ['required', 'min:3', 'max:20', 'unique:roles,name,'.$role->id],
        ]);

        $role->code =  $request->input(['code']);
        $role->name =  $request->input(['name']);
        if ($role->save()) {
            return Redirect::route('roles.index')->with([
                'success' => 'El rol se ha actualizado correctamente',
            ]);
        } else {
            return view('roles.edit')->with([
                'error' => 'Ha ocurrido un error al actualizar el rol, intente nuevamente',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return Redirect::route('roles.index')->with([
                'success' => 'El rol se ha eliminado correctamente',
            ]);
        } else {
            return Redirect::route('roles.index')->with([
                'error' => 'Ha ocurrido un error al eliminar el rol, intente nuevamente',
            ]);
        }
    }
}
