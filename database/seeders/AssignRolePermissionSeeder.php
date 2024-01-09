<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class AssignRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::first();
        $admin->assignRole('admin');
        $permissions = Permission::get();
        $adminRole = Role::where('name','admin')->first();
        $adminRole->syncPermissions($permissions);
    }
}
