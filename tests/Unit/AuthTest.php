<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * Test to ensure that the user can login with the correct credentials.
     *
     * @return void
     */
    public function testUserLogin() {
        $body = [
            'email' => 'david.john@noreply.com',
            'password' => 'password'
        ];
        $this->json('POST', '/api/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure(['success','message','access_token','refresh_token']);
    }
}
