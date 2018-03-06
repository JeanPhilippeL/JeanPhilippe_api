<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostStation()
    {
        $response = $this->post('/api/stations',
            ['name' => 'Test-A', 'lat' => '180', 'long' => '135'],
            ['Accept' => 'application/json']);

        $response->assertStatus(201);
    }

    public function testPostStationWithoutName()
    {
        $response = $this->post('/api/stations',
            ['lat' => '180', 'long' => '135'],
            ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostStationWithoutLat()
    {
        $response = $this->post('/api/stations',
            ['name' => 'Test-A', 'long' => '135'],
            ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostStationWithoutLong()
    {
        $response = $this->post('/api/stations',
            ['name' => 'Test-A', 'lat' => '180',],
            ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }

    public function testDeleteStation()
    {
        $response = $this->put('/api/stations/1');
        ['Accept' => 'application/json'];

        $response->assertStatus(302);
    }

}