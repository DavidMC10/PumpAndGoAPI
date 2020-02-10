<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\ClientRepository;
use Tests\CreatesApplication;
use Tests\TestCase;

class AuthTest extends TestCase
{
    // use RefreshDatabase;

    public function createGrantToken() {
        $this->artisan('passport:client', ['--password' => null, '--no-interaction' => true]);

        $clientRepository = new ClientRepository();
        $client = $clientRepository->createPersonalAccessClient(
            null, 'Test Personal Access Client', $this->baseUrl
        );

        DB::table('oauth_personal_access_clients')->insert([
            'client_id' => $client->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Test to ensure that the user can login with the correct credentials.
     *
     * @return void
     */
    public function testUserLoginSuccess() {

        $body = [
            'email' => 'david.john@noreply.com',
            'password' => 'password'
        ];

        $this->json('POST', '/api/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure(['success','message','access_token','refresh_token']);
    }

    /**
     * Test to ensure that the user can't login with incorrect credentials.
     *
     * @return void
     */
    public function testUserLoginFailure() {

        $body = [
            'email' => 'david.john2@noreply.com',
            'password' => 'password1'
        ];

        $this->json('POST', '/api/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(401)
            ->assertJsonStructure(['success','message']);
    }

    /**
     * Test to ensure that the user can register.
     *
     * @return void
     */
    public function testUserRegisterSuccess() {

        $body = [
            'firstName' => 'Patrick',
            'lastName' => 'Gormley',
            'email' => 'patrick.gormley2@noreply.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $this->json('POST', '/api/register', $body, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure(['success','message','access_token','refresh_token']);
    }

    /**
     * Test uses the same email to ensure that two of the same emails cannot be added.
     *
     * @return void
     */
    public function testUserRegisterFailure() {

        $body = [
            'firstName' => 'Patrick',
            'lastName' => 'Gormley',
            'email' => 'patrick.gormley2@noreply.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $this->json('POST', '/api/register', $body, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure(['success','message','access_token','refresh_token']);
    }
}
