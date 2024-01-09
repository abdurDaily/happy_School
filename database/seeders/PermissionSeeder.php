<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create',
            'delete',
            'edit'
        ];

        foreach($permissions as $permission){
            Permission::create(['guard_name'=>"admin",'name' => $permission]);
        }

    }
}
