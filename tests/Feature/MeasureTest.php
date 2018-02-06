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
            ['Value'=> '3', 'Description'=>'co2'],
            ['Accept'=> 'application/json']);


        //$response->assertJsonFragment(['Value'=>'3']);


        $response->assertStatus(200);
    }

    public function testPostMeasureWithoutValueTest()
    {
        $response = $this->post('/api/measures', ['Description'=>'co2'],
            ['Accept'=> 'application/json']);
        $response->assertJsonFragment(["Value"=>["The value field is required."]]);
        $response->assertStatus(422);
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
