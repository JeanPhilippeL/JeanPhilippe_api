<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;


class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testServerCreation()
    {
        Passport::actingAs(
            \App\User::find(1)
        );
        $response = $this->post('/register',
            ['name'=> 'Alia',
            'email'=> 'alia@hotmail.com',
            'password'=> '123456'],
            ['Accept'=> 'application/json']);

        //echo (json_decode($response));
        $response->assertStatus(200);
    }

}
