<?php

namespace Database\Seeders;

use App\Models\Admin\Routine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routineData = new Routine();
        $routineData->routine_title = "test routine";
        $routineData->routine_image =  asset('custom_img/cover.pdf');
        $routineData->save();
    }
}
