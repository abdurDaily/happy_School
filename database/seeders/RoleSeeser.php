<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = new Role();
        $roles->name = "admin";
        $roles->save(); 
    }
}
