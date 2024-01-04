<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function roles()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.roles', compact('roles', 'permissions'));
    }

    public function editar_rol($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('admin.editar_rol', compact('role', 'permissions'));
    }

    public function actualizar_rol(Role $rol, Request $request)
    {
        $rol->update([
            'name' => $request->input('name'), // Corrección aquí
        ]);

        $rol->syncPermissions($request->input('permissions', []));

        return redirect()->route('admin.roles');
    }

    public function crear_rol()
    {
        return view('admin.crear_rol');
    }

    public function crear_nuevo_rol(Request $request)
    {
        $rol = Role::create([
            'name' => $request->input('name'),
        ]);

        $rol->syncPermissions($request->input('permissions', []));

        return redirect()->route('admin.roles');
    }

    public function listar_usuarios()
    {
        return view('admin.usuarios');
    }

    public function editar_usuario($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.editar_usuario', compact('user', 'roles'));
    }

    public function actualizar_usuario(User $user, Request $request)
    {
        $user->update([
            'name' => $request->input('name'), // Corrección aquí
        ]);

        $user->syncRoles($request->input('roles', []));

        return redirect()->route('admin.listar_usuarios');
    }
}
