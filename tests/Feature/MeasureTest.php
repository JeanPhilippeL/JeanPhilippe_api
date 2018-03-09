<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MeasureTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetMeasureTest()
    {
        $response = $this->get('/api/stations/1/measure',
        ['Accept'=> 'application/json'],
            ['Content-Type' => 'application/json']);

        $response->assertJsonFragment(['value' => 400]);
        $response->assertStatus(200);
    }

    public function testGetMultipleMeasuresTest()
    {
        $response = $this->get('/api/stations/1/measure',
            ['Accept' => 'application/json'],
            ['Content-Type' => 'application/json']);

        $response->assertJsonFragment(['value' => 400]);
        $response->assertJsonFragment(['value' => 600]);
        $response->assertStatus(200);
    }

    public function testGetMeasureOnStationOtherThanTheFirstOneTest()
    {
        $response = $this->get('/api/stations/2/measure',
            ['Accept'=> 'application/json'],
            ['Content-Type' => 'application/json']);

        $response->assertJsonFragment(['value' => 3]);
        $response->assertStatus(200);
    }

    public function testGetColor()
    {
        $response = $this->get('/api/stations/2/measure',
            ['Accept'=> 'application/json'],
            ['Content-Type' => 'application/json']);
        $response->assertJsonFragment(['color' => 'Green']);
        $response->assertStatus(200);
    }

    public function testGetMauvaisIndex()
    {
        $response = $this->get('/api/stations/1/measure',
            ['Accept'=> 'application/json'],
            ['Content-Type' => 'application/json']);

        $response->assertJsonFragment(['index' => 'Mauvais']);
        $response->assertStatus(200);
    }

    public function testPostMeasureOnSpecificStation()
    {
        $response = $this->post('/api/stations/1',
            ['Accept'=> 'application/json'],
            ['Content-Type' => 'application/json'],
            ['description'=>'Co14', 'value'=>60]);

        $response->assertJsonFragment(['description'=>'Co14']);

    }







}
