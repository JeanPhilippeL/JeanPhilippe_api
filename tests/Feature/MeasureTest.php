<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MeasureTest extends TestCase
{
    use DatabaseTransactions;

    public function testPostMeasureTest()
    {
        $response = $this->post('/api/measures',
            ['value'=> '30', 'description'=>'co1'],
            ['Accept'=> 'application/json']);

        $response->assertJsonFragment(['Value'=>'30']);
        $response->assertStatus(201);
    }

    public function testPostMeasureWithoutValueTest()
    {
        $response = $this->post('/api/measures', ['description'=>'co2'],
            ['Accept'=> 'application/json']);
        $response->assertJsonFragment(["value"=>["The value field is required."]]);
        $response->assertStatus(422);
    }

    public function testPostMeasureWithoutDescriptionTest()
    {
        $response = $this->post('/api/measures', ['value'=> '3'],
            ['Accept'=> 'application/json']);
        $response->assertJsonFragment(["description"=>["The description field is required."]]);
        $response->assertStatus(422);
    }

    public function testGetMeasureTest()
    {
        $this->post('/api/measures',
            ['value'=> '1', 'description'=>'co1'],
            ['Accept'=> 'application/json']);


        $response = $this->get('/api/measures/1',['Accept'=> 'application/json']);
        $response->assertJsonFragment(['Description']);
        $response->assertStatus(200);
    }

    public function testPutMeasureTest()
    {
        $this->put('/api/measures/1',
            ['value'=> '3', 'description'=>'co15'],
            ['Accept'=> 'application/json']);

        $response = $this->get('/api/measures/1',['Accept'=> 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonFragment(['Description'=>'co15']);
    }

    public function testIncorrectValuePutMeasureTest()
    {
        $response = $this->put('/api/measures/1',
            ['value'=> 'a', 'description'=>'co15'],
            ['Accept'=> 'application/json']);

        //$response = $this->get('/api/measures/1',['Accept'=> 'application/json']);
        $response->assertStatus(422);
    }

    public function testIncorrectDescriptionPutMeasureTest()
    {
        $response = $this->put('/api/measures/1',
            ['value'=> '1', 'description'=>''],
            ['Accept'=> 'application/json']);
        $response->assertStatus(422);
    }

    public function testIncorrectDescriptionAndValuePutMeasureTest()
    {
        $response = $this->put('/api/measures/1',
            ['value'=> '1', 'description'=>''],
            ['Accept'=> 'application/json']);
        $response->assertStatus(422);
    }

    public function testDeleteMeasureTest()
    {
        $this->delete('/api/measures/1',
            ['Accept'=> 'application/json']);

        $response = $this->get('/api/measures/1',['Accept'=> 'application/json']);

        $response->assertStatus(404);
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
