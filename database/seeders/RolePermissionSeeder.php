<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Créer des rôles
        $admin = Role::create(['name' => 'Administrateur']);
        $assistant = Role::create(['name' => 'Assistante Médicale']);

        // Créer des permissions
        $permissions = [
            'create_user',
            'edit_user',
            'delete_user',
            'view_user',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assigner des permissions aux rôles
        $admin->givePermissionTo(Permission::all());
        $assistant->givePermissionTo(['view_user']);
    }
}
