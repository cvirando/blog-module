<?php

/**
 * Made by CV. IRANDO
 * https://irando.co.id ©2023
 * info@irando.co.id
 */

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'add blog categories', 'module' => 'Blog']);
        Permission::create(['name' => 'edit blog categories', 'module' => 'Blog']);
        Permission::create(['name' => 'delete blog categories', 'module' => 'Blog']);
        Permission::create(['name' => 'add blog posts', 'module' => 'Blog']);
        Permission::create(['name' => 'edit blog posts', 'module' => 'Blog']);
        Permission::create(['name' => 'delete blog posts', 'module' => 'Blog']);

        $role = Role::firstOrCreate(['name' => 'staff']);
        $role->givePermissionTo([
            'add blog categories',
            'edit blog categories',
            'add blog posts',
            'edit blog posts',
        ]);

        $role = Role::firstOrCreate(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
