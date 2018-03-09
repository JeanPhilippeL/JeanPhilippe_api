<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StationTest extends TestCase
{
    use DatabaseTransactions;
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
            ['name' => 'Test-A', 'lat' => '180', 'long' => '135', 'user_id' => 1],
            ['Accept' => 'application/json']);

        $response->assertStatus(201);
    }

    public function testPostStationWithoutName()
    {
        Passport::actingAs(
            \App\User::find(1)
        );
        $response = $this->post('/api/stations',
            ['lat' => '180', 'long' => '135', 'user_id' => 1],
            ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostStationWithoutLat()
    {
        Passport::actingAs(
            \App\User::find(1)
        );
        $response = $this->post('/api/stations',
            ['name' => 'Test-A', 'long' => '135', 'user_id' => 1],
            ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostStationWithoutLong()
    {
        Passport::actingAs(
            \App\User::find(1)
        );
        $response = $this->post('/api/stations',
            ['name' => 'Test-A', 'lat' => '180', 'user_id' => 1],
            ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostStationUnauthorized()
    {

        $response = $this->post('/api/stations',
            ['name' => 'Test-A', 'lat' => '180', 'user_id' => 1],
            ['Accept' => 'application/json']);

        $response->assertStatus(401);
    }


    public function testPutStation()
    {
        Passport::actingAs(
            \App\User::find(1)
        );
        $response = $this->put('/api/stations/1',
            ['name' => 'Test-C', 'lat' => '180', 'long' => '135', 'user_id' => 1],
            ['Accept' => 'application/json']);

        $response->assertStatus(200);
    }

    public function testGetStation()
    {

        $response = $this->get('/api/stations/1',
            ['Accept' => 'application/json']);
        $response->assertJsonFragment(['Name' => 'Station A']);

    }
    public function testDeleteStation()
    {
        Passport::actingAs(
            \App\User::find(1)
        );
        $response = $this->delete('/api/stations/1');


        $response->assertStatus(200);
    }


}