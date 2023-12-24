<?php

namespace Database\Seeders;

use App\Models\Admin\Newsevent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewseventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event_data = new Newsevent();
        $event_data->event_title = "this is testing event title...!";
        $event_data->event_detail = "this is testing event details...!";
        $event_data->event_video = "https://www.youtube.com/watch?v=-FxEYa8joK8";
        $event_data->event_img = env('PLACEHOLDER');
        $event_data->save();
    }
}
