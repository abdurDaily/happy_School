<?php

namespace Database\Seeders;

use App\Models\Admin\Aboutgallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutgallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $aboutGalleryData =  new Aboutgallery();
      $aboutGalleryData->about_galary_text = "this for testing purpose";
      $aboutGalleryData->about_institute = "this for testing purpose";
      $aboutGalleryData->about_galary_img = asset('custom_img/about.png');
      $aboutGalleryData->save();
    }
}
