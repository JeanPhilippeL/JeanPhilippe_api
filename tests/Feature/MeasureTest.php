<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Passport\Passport;

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

    public function testGetGreenColor()
    {
        $response = $this->get('/api/stations/2/measure',
            ['Accept'=> 'application/json'],
            ['Content-Type' => 'application/json']);
        $response->assertJsonFragment(['color' => 'Green']);

    }

    public function testGetRedColor()
    {
        $response = $this->get('/api/stations/1/measure',
            ['Accept'=> 'application/json'],
            ['Content-Type' => 'application/json']);
        $response->assertJsonFragment(['color' => 'Red']);

    }

    public function testGetMauvaisIndex()
    {
        $response = $this->get('/api/stations/1/measure',
            ['Accept'=> 'application/json'],
            ['Content-Type' => 'application/json']);

        $response->assertJsonFragment(['index' => 'Mauvais']);
        $response->assertStatus(200);
    }

    public function test24h()
    {
        $response = $this->get('/api/stations/1/measure/24h',
            ['Accept'=> 'application/json'],
            ['Content-Type' => 'application/json']);

        $response->assertJsonFragment(['index' => 'Mauvais']);
        $response->assertStatus(200);
    }

    public function testPostMeasure()
    {
        $response = $this->post('/api/stations/1/measures',
            ['description' => 'co14', 'value' => 60],
            ['Accept' => 'application/json']);


        $response->assertStatus(201);
    }
}
