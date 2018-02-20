<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'JeanPhilippe';
        $user->email = 'email@gmail.com';
        $user->password = '1234';
        $user->save();
    }
}
