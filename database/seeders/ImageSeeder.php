<?php

namespace Database\Seeders;

use App\Models\Admin\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imgData = new Image();
        $imgData->img_title = "institute";
        $imgData->galary_img = asset('custom_img/placeholder_1.webp');
        $imgData->save();
    }
}
