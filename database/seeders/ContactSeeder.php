<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contact = new Contact();
        $contact->contact_info = 'this is very basic info about this istitution....';
        $contact->contact_location_link = 'https://www.google.com/maps/@22.359112,91.8312967,14z/data=!5m1!1e1?entry=ttu';
        $contact->contact_numbers = '01825252525';
        $contact->contact_email = 'abc@gmail.com';
        $contact->contact_address = 'ctg, bangladesh...';
        $contact->contact_schedule = 'Saturday- Friday 9:00 am to 8:00 pm';
        $contact->save();
    }
}
