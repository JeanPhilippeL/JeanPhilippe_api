<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

class StationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostStation()
    {
        Passport::actingAs(
            \App\User::find(1)
        );
        $response = $this->post('/api/stations',
            ['name' => 'Test-A', 'lat' => '180', 'long' => '135'],
            ['Accept' => 'application/json']);

        $response->assertStatus(201);
    }

    public function testPostStationWithoutName()
    {
        Passport::actingAs(
            \App\User::find(1)
        );
        $response = $this->post('/api/stations',
            ['lat' => '180', 'long' => '135'],
            ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostStationWithoutLat()
    {
        Passport::actingAs(
            \App\User::find(1)
        );
        $response = $this->post('/api/stations',
            ['name' => 'Test-A', 'long' => '135'],
            ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostStationWithoutLong()
    {
        Passport::actingAs(
            \App\User::find(1)
        );
        $response = $this->post('/api/stations',
            ['name' => 'Test-A', 'lat' => '180',],
            ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }

    /*public function testDeleteStation()
    {
        $response = $this->put('/api/stations/1');
        ['Accept' => 'application/json'];

        $response->assertStatus(302);
    }*/

}