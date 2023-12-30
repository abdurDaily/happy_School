<?php

namespace Database\Seeders;

use App\Models\Admin\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videoData = new Video();
        $videoData->video_link = "https://www.youtube.com/watch?v=aPUVUrS2oC0";
        $videoData->save();
    }
}
