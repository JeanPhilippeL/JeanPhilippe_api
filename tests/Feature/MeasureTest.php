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


        $response->assertJsonFragment(['Value'=>'3']);


        $response->assertStatus(201);
    }

    public function testPostMeasureWithoutValueTest()
    {
        $response = $this->post('/api/measures', ['Description'=>'co2'],
            ['Accept'=> 'application/json']);
        $response->assertJsonFragment(["Value"=>["The value field is required."]]);
        $response->assertStatus(422);
    }

    public function testPostMeasureWithoutDescriptionTest()
    {
        $response = $this->post('/api/measures', ['Value'=> '3'],
            ['Accept'=> 'application/json']);
        $response->assertJsonFragment(["Description"=>["The description field is required."]]);
        $response->assertStatus(422);
    }

    public function testGetMeasureTest()
    {
        $this->post('/api/measures',
            ['Value'=> '3', 'Description'=>'co3'],
            ['Accept'=> 'application/json']);


        $response = $this->get('/api/measures/1',['Accept'=> 'application/json']);
        $response->assertStatus(200);
    }

    public function testPutMeasureTest()
    {
        $response = $this->put('/api/measures/11',
            ['Value'=> '3', 'Description'=>'co5'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(201);
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
