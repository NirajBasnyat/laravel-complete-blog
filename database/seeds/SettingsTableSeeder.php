<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
        	'site_name' => "NextBlog",
        	'contact_number' => '12391247',
        	'contact_email' => 'mail@mail.com',
        	'address' => 'South baker street'
        ]);


        
    }
}
