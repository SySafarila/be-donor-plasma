<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'admin access']);
        Permission::create(['name' => 'visitor access']);

        Permission::create(['name' => 'permissions read']);
        Permission::create(['name' => 'permissions create']);
        Permission::create(['name' => 'permissions store']);
        Permission::create(['name' => 'permissions edit']);
        Permission::create(['name' => 'permissions update']);
        Permission::create(['name' => 'permissions delete']);

        Permission::create(['name' => 'roles read']);
        Permission::create(['name' => 'roles create']);
        Permission::create(['name' => 'roles store']);
        Permission::create(['name' => 'roles edit']);
        Permission::create(['name' => 'roles update']);
        Permission::create(['name' => 'roles delete']);

        Permission::create(['name' => 'users read']);
        Permission::create(['name' => 'users create']);
        Permission::create(['name' => 'users store']);
        Permission::create(['name' => 'users edit']);
        Permission::create(['name' => 'users update']);
        Permission::create(['name' => 'users delete']);
    }
}
