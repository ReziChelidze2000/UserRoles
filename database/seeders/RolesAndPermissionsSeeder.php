<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'can access endpoint1']);
        Permission::create(['name' => 'can access endpoint2']);
        Permission::create(['name' => 'can access endpoint3']);
        Permission::create(['name' => 'can access endpoint4']);

        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());

        Role::create(['name' => 'user']);
    }
}
