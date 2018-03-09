<?php

use Illuminate\Database\Seeder;
use App\Measure;

class MeasureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measure = new Measure();
        $measure->value = 400;
        $measure->description = 'Co1';
        $measure->station_id = 1;
        $measure->save();

        $measure = new Measure();
        $measure->value = 600;
        $measure->description = 'Co2';
        $measure->station_id = 1;
        $measure->save();


        $measure = new Measure();
        $measure->value = 3;
        $measure->description = 'Co3';
        $measure->station_id = 2;
        $measure->save();



    }
}
