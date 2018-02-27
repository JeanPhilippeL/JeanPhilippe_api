<?php

namespace Tests\Feature;

use Tests\TestCase;
use DateTime;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ProfileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function testPostProfileTest()
    {
        $response = $this->put('/api/users/2/profile',

            [   'ddn'=> new DateTime('2000-01-02'),
                'web_site_url'=> '30',
                'facebook_url'=> '30',
                'linkedin_url'=> '30'],
            ['Accept'=> 'application/json']);

        //$response->assertJsonFragment(['web_site_url'=>'30']);
        $response->assertStatus(200);

    }

    /*public function testPostProfileTest()
    {
        $response = $this->put('/api/users/2/profile',

            [   'ddn'=> new DateTime('2000-01-02'),
                'web_site_url'=> '30',
                'facebook_url'=> '30',
                'linkedin_url'=> '30'],
            ['Accept'=> 'application/json']);

        //$response->assertJsonFragment(['web_site_url'=>'30']);
        $response->assertStatus(200);

    }*/

    public function testPostProfileBadPathTest()
    {
        $response = $this->put('/api/users/30/profile',
            ['ddn'=> new DateTime('2000-01-02'),
                'web_site_url'=> '30',
                'facebook_url'=> '30',
                'linkedin_url'=> '30'],
            ['Accept'=> 'application/json']);

        //$response->assertJsonFragment(['web_site_url'=>'30']);
        $response->assertStatus(404);

    }
}
