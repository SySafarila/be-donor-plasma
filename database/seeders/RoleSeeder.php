<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::create(['name' => 'super admin']);
        $admin = Role::create(['name' => 'admin']);
        $visitor = Role::create(['name' => 'visitor']);

        $superAdmin->syncPermissions(['admin access']);
        $admin->syncPermissions(['admin access']);
        $visitor->syncPermissions(['visitor access']);
    }
}
