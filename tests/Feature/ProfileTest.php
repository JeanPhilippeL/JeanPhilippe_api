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


    public function testPostNotExistProfileTest()
    {
        $response = $this->put('/api/users/2/profile',

            [   'ddn'=> new DateTime('2000-01-02'),
                'web_site_url'=> '30',
                'facebook_url'=> '30',
                'linkedin_url'=> '30'],
            ['Accept'=> 'application/json']);

        $response->assertJsonFragment(['web_site_url'=>'30']);
        $response->assertStatus(200);

    }

    public function testPostExistProfileTest()
    {
        $response = $this->put('/api/users/1/profile',

            [   'ddn'=> new DateTime('2000-01-06'),
                'web_site_url'=> '31',
                'facebook_url'=> '31',
                'linkedin_url'=> '31'],
            ['Accept'=> 'application/json']);

        $response->assertJsonFragment(['web_site_url'=>'31']);
        $response->assertStatus(200);
    }

    public function testPostProfileIntegerWebSiteUrl()
    {
        $response = $this->put('/api/users/2/profile',
            ['ddn'=> new DateTime('2000-01-02'),
                'web_site_url'=> 30,
                'facebook_url'=> '30',
                'linkedin_url'=> '30'],
            ['Accept'=> 'application/json']);
        $response->assertStatus(422);
    }

    public function testPostProfileIntegerFacebookUrl()
    {
        $response = $this->put('/api/users/2/profile',
            ['ddn'=> new DateTime('2000-01-02'),
                'web_site_url'=> '30',
                'facebook_url'=> 30,
                'linkedin_url'=> '30'],
            ['Accept'=> 'application/json']);
        $response->assertStatus(422);
    }

    public function testPostProfileIntegerLinkedInUrl()
    {
        $response = $this->put('/api/users/2/profile',
            ['ddn'=> new DateTime('2000-01-02'),
                'web_site_url'=> '30',
                'facebook_url'=> '30',
                'linkedin_url'=> 30],
            ['Accept'=> 'application/json']);
        $response->assertStatus(422);
    }
    public function testPostProfileStringDDN()
    {
        $response = $this->put('/api/users/2/profile',
            ['ddn'=> 'allo',
                'web_site_url'=> '30',
                'facebook_url'=> '30',
                'linkedin_url'=> '30'],
            ['Accept'=> 'application/json']);
        $response->assertStatus(422);
    }

    public function testPostProfileWithoutDDN()
    {
        $response = $this->put('/api/users/2/profile',
            [
                'web_site_url'=> '30',
                'facebook_url'=> '30',
                'linkedin_url'=> '30'],
            ['Accept'=> 'application/json']);
        $response->assertStatus(422);
    }

    public function testGetProfileTest()
    {
        $response = $this->get('/api/users/1/profile',['Accept'=> 'application/json']);
        $response->assertJsonFragment(['ddn']);
        $response->assertStatus(200);
    }

    public function testGetInexistantProfileTest()
    {
        $response = $this->get('/api/users/-1/profile',['Accept'=> 'application/json']);
        $response->assertStatus(404);
    }
}
