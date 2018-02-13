<?php

use Illuminate\Database\Seeder;
use App\Measure;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measure = new Measure();
        $measure->value = 1;
        $measure->description = 'Co1';
        $measure->save();

        $measure = new Measure();
        $measure->value = 2;
        $measure->description = 'Co2';
        $measure->save();

        $measure = new Measure();
        $measure->value = 3;
        $measure->description = 'Co3';
        $measure->save();

        $measure = new Measure();
        $measure->value = 4;
        $measure->description = 'Co4';
        $measure->save();
    }
}
