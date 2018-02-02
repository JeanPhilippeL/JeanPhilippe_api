<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MeasureTest extends TestCase
{
    public function testPostMeasureTest()
    {
        $response = $this->post('/api/measures',
            ['value'=> '3', 'description'=>'co2'],
            ['Accept'=> 'application/json']);
        $response->assertJsonFragment(['value'=>'3']);
        $response->assertStatus(200);
    }

    public function testPostMeasureWithoutValueTest()
    {
        $response = $this->post('/api/measures', ['description'=>'co2'],
            ['Accept'=> 'application/json']);
        $response->assertJsonFragment(["value"=>["The value field is required."]]);
        $response->assertStatus(422);
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
