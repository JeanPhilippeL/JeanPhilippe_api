<?php

use Illuminate\Database\Seeder;
use App\User;

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
        $user->password = Hash::make('1234');
        $user->save();

        $user = new User();
        $user->name = 'Sebastien';
        $user->email = 'email2@gmail.com';
        $user->password = Hash::make('1234');
        $user->save();
    }
}
