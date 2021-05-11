<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('updated_at', 'desc')->paginate(5);

        foreach ($users as $user) {
            $date = Carbon::parse($user->date_of_birth);
            $now = Carbon::now();

            $user->date_of_birth = $date->diffInYears($now);
        }

        return view('users.index')->with([
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('code', 'asc')->get();

        return view('users.create')->with([
            'roles' => $roles,
        ]);
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
            'last_name' => ['alpha', 'required', 'min:2', 'max:20'],
            'first_name' => ['alpha', 'required', 'min:2', 'max:20'],
            'date_of_birth' => ['required', 'date', 'date_format:Y-m-d', 'before_or_equal:' . date('Y-m-d')],
            'email' => ['required', 'email:filter', 'unique:users'],
            'phone' => ['required', 'digits: 10', 'numeric'],
            'role_id' => ['required']
        ]);

        $user = new User();
        $user->last_name = $request->input(['last_name']);
        $user->first_name = $request->input(['first_name']);
        $user->date_of_birth = $request->input(['date_of_birth']);
        $user->email = $request->input(['email']);
        $user->phone = $request->input(['phone']);
        $user->role_id = $request->input(['role_id']);
        if ($user->save()) {
            return Redirect::route('index')->with([
                'success' => 'El usuario se ha creado correctamente',
            ]);
        } else {
            return view('users.create')->with([
                'error' => 'Ha ocurrido un error al crear el usuario, intente nuevamente',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $date = Carbon::parse($user->date_of_birth);
        $now = Carbon::now();
        $user->date_of_birth = $date->diffInYears($now);

        return view('users.show')->with([
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('code', 'asc')->get();

        return view('users.edit')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'last_name' => ['alpha', 'required', 'min:2', 'max:20'],
            'first_name' => ['alpha', 'required', 'min:2', 'max:20'],
            'date_of_birth' => ['required', 'date', 'date_format:Y-m-d', 'before_or_equal:' . date('Y-m-d')],
            'email' => ['required', 'email:filter', 'unique:users,email,'.$user->id],
            'phone' => ['required', 'numeric', 'digits: 10'],
            'role_id' => ['required']
        ]);

        $user->last_name = $request->input(['last_name']);
        $user->first_name = $request->input(['first_name']);
        $user->date_of_birth = $request->input(['date_of_birth']);
        $user->email = $request->input(['email']);
        $user->phone = $request->input(['phone']);
        $user->role_id = $request->input(['role_id']);
        if ($user->save()) {
            return Redirect::route('index')->with([
                'success' => 'El usuario se ha actualizado correctamente',
            ]);
        } else {
            return view('users.edit')->with([
                'error' => 'Ha ocurrido un error al actualizar el usuario, intente nuevamente',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return Redirect::route('index')->with([
                'success' => 'El usuario se ha eliminado correctamente',
            ]);
        } else {
            return Redirect::route('index')->with([
                'error' => 'Ha ocurrido un error al eliminar el usuario, intente nuevamente',
            ]);
        }
    }
}
