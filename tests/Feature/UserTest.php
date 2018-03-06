<?php

namespace Tests\Feature;

use function MongoDB\BSON\fromJSON;
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

    public function testPostUserStatus()
    {

        $response = $this->post('api/register',
            ['name'=> 'Alia',
            'email'=> 'aliamail@hotmail.com',
            'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        /*Passport::actingAs(
            \App\User::find(1)
        );*/

        $response->assertStatus(201)->assertJsonStructure(['accesstoken']);
    }

    public function testPostUserNameTooLong()
    {

        $response = $this->post('api/register',
            ['name'=> 'AliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaa',
                'email'=> 'aliamailasd@hotmail.com',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNameNotString()
    {

        $response = $this->post('api/register',
            ['name'=> 30,
                'email'=> 'aliamailasd@hotmail.com',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNoName()
    {

        $response = $this->post('api/register',
            [   'email'=> 'aliamailasd@hotmail.com',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNotEmail()
    {

        $response = $this->post('api/register',
            ['name'=> 'Mathieu',
                'email'=> 'MathMailBox',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNameNoEmail()
    {

        $response = $this->post('api/register',
            ['name'=> 30, 'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNotUniqueEmail()
    {

        $response = $this->post('api/register',
            ['name'=> 'Alia',
                'email'=> 'aliamail@hotmail.com',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserEmailTooLong()
    {

        $response = $this->post('api/register',
            ['name'=> 'Mathieu',
                'email'=> 'abcdeiamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasd@hotmail.com',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNoPasword()
    {

        $response = $this->post('api/register',
            ['name'=> 'Mathieu',
                'email'=> 'aliamail123@hotmail.com'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

}
