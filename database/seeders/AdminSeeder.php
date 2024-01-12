<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin();
        $admin->name = "Admin";
        $admin->email = "abdur@gmail.com";
        $admin->password = Hash::make('password');
        $admin->employee_designation = "pera😢";
        $admin->employee_phone = "0123456789";
        $admin->employee_about = "ki r bolbo? obstha kharap!";
        $admin->employee_image = asset('custom_img/img_placeholder.jpg');
        $admin->save();
    }
}
