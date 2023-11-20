<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'cliente']);

        // Crear permisos
        $productPermission = Permission::create(['name' => 'product.index']);
        $userPermission = Permission::create(['name' => 'user.index']); // Nuevo permiso para la ruta de usuarios

        // Asignar permisos a roles
        $adminRole->givePermissionTo([$productPermission, $userPermission]);

        $this->command->info('Roles and permissions seeded successfully.');
    }
}
