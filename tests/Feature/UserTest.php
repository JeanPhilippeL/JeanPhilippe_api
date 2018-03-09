<?php

namespace Tests\Feature;

use function MongoDB\BSON\fromJSON;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
//use Laravel\Passport\Bridge\User;
use Illuminate\Foundation\Auth\User;


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
            ['name'=> 'Aliamaria',
            'email'=> 'aliamaria@hotmail.com',
            'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);



        $response->assertStatus(201)->assertJsonStructure(['accesstoken']);
    }

    public function testPostUserNameTooLong()
    {
        Passport::actingAs(
            \App\User::find(1)
        );

        $response = $this->post('api/register',
            ['name'=> 'AliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaaAliaa',
                'email'=> 'aliamailasd@hotmail.com',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNameNotString()
    {
        Passport::actingAs(
            \App\User::find(1)
        );

        $response = $this->post('api/register',
            ['name'=> 30,
                'email'=> 'aliamailasd@hotmail.com',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNoName()
    {
        Passport::actingAs(
            \App\User::find(1)
        );

        $response = $this->post('api/register',
            [   'email'=> 'aliamailasd@hotmail.com',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNotEmail()
    {
        Passport::actingAs(
        \App\User::find(1)
        );

        $response = $this->post('api/register',
            ['name'=> 'Mathieu',
                'email'=> 'MathMailBox',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNameNoEmail()
    {
        Passport::actingAs(
            \App\User::find(1)
        );

        $response = $this->post('api/register',
            ['name'=> 30, 'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNotUniqueEmail()
    {
        Passport::actingAs(
            \App\User::find(1)
        );

        $response = $this->post('api/register',
            ['name'=> 'Alia',
                'email'=> 'aliamail@hotmail.com',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserEmailTooLong()
    {
        Passport::actingAs(
            \App\User::find(1)
        );

        $response = $this->post('api/register',
            ['name'=> 'Mathieu',
                'email'=> 'abcdeiamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasdaliamailasd@hotmail.com',
                'password'=> 'abc123456'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

    public function testPostUserNoPassword()
    {
        Passport::actingAs(
            \App\User::find(1)
        );

        $response = $this->post('api/register',
            ['name'=> 'Mathieu',
                'email'=> 'aliamail123@hotmail.com'],
            ['Accept'=> 'application/json']);

        $response->assertStatus(422);
    }

}
