<?php
use Illuminate\Database\Seeder;
use App\Station;
class StationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $station = new Station();
        $station->name = "Station A";
        $station->lat = "180";
        $station->long = "120";
        $station->user_id = 1;
        $station->save();

        $station = new Station();
        $station->name = "Station B";
        $station->lat = "180";
        $station->long = "120";
        $station->user_id = 1;
        $station->save();
    }
}