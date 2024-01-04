<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'crear eventos']);
        Permission::create(['name' => 'editar eventos']);
        Permission::create(['name' => 'borrar eventos']);
        Permission::create(['name' => 'publicar eventos']);
        Permission::create(['name' => 'ocultar eventos']);

        Permission::create(['name' => 'crear roles']);
        Permission::create(['name' => 'editar roles']);
        Permission::create(['name' => 'borrar roles']);
        Permission::create(['name' => 'asignar roles']);
        Permission::create(['name' => 'desasignar roles']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'editor']);
        $role1->givePermissionTo('crear eventos');;
        $role1->givePermissionTo('editar eventos');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('borrar eventos');
        $role2->givePermissionTo('publicar eventos');
        $role2->givePermissionTo('ocultar eventos');
        $role2->givePermissionTo('crear roles');
        $role2->givePermissionTo('editar roles');
        $role2->givePermissionTo('borrar roles');
        $role2->givePermissionTo('asignar roles');
        $role2->givePermissionTo('desasignar roles');

        // $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
            'password' => bcrypt('1234'), // password
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Fabio',
            'email' => 'admin@app.com',
            'password' => bcrypt('1234'), // password
        ]);
        $user->assignRole($role2);

    }
}