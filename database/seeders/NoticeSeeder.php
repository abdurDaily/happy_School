<?php

namespace Database\Seeders;

use App\Models\Admin\Notice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $noticeData = new Notice();
        $noticeData->notice_title = "victory day";
        $noticeData->notice_details = "off day...";
        $noticeData->notice_image = asset('custom_img/cover.pdf');
        $noticeData->save();
    }
}
