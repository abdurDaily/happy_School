<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Facultystaff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultystaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employeeData = new Facultystaff();
        $employeeData->employee_name='Dr. John Doe';
        $employeeData->employee_designation="Associate Professor";
        $employeeData->employee_phone="0123456789";
        $employeeData->employee_email="john@example.com";
        $employeeData->employee_image=env('PLACEHOLDER');
        $employeeData->employee_join_date="2000-02-02";
        $employeeData->employee_about="somthing";
        $employeeData->save();
    }
}
