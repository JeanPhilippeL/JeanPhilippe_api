<?php

use Illuminate\Database\Seeder;
use App\Profile;
use App\User;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = new Profile();
        $profile->user_id = 1;
        $date = new DateTime('2000-01-01');
        $date->format('Y-m-d');
        $profile->ddn = $date;
        $profile->web_site_url = 'aa';
        $profile->facebook_url = 'as';
        $profile->linkedin_url = 'asd';
        $profile->save();
    }
}
