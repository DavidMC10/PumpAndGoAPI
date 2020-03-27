<?php

namespace Tests\Unit;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\Passport;
use Tests\CreatesApplication;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;
    // use DatabaseTransactions;

    public $mockConsoleOutput = false;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');

        $this->artisan('passport:client', ['--password' => null, '--no-interaction' => true]);
        $this->artisan('passport:keys', ['--no-interaction' => true]);
    }

    // public function createGrantToken() {
    //     $this->artisan('passport:client', ['--password' => null, '--no-interaction' => true]);

    //     $clientRepository = new ClientRepository();
    //     $client = $clientRepository->createPersonalAccessClient(
    //         null, 'Test Personal Access Client', $this->baseUrl
    //     );

    //     DB::table('oauth_personal_access_clients')->insert([
    //         'client_id' => $client->id,
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ]);
    // }


    /**
     * Test to ensure that the user can't login with incorrect credentials.
     *
     * @return void
     */
    public function testUserRegisterSuccess()
    {

        // Arrange
        $credentials = [
            'email' => 'david.test@noreply.com',
            'password' => 'password',
            'first_name' => 'David',
            'last_name' => 'McElhinney'
        ];

        // Act
        $response = $this->post('/api/register', $credentials);

        // Assert
        $response->assertStatus(200);
    }


    // public function testUserLogout()
    // {

    //     $this->assertDatabaseHas('user', [
    //         'email' => 'alyd.mclaughlin2@noreply.com'
    //     ]);
    // }

    /**
     * Test to ensure that the user can login with the correct credentials.
     *
     * @return void
     */
    public function testUserLoginSuccess()
    {
        // Arrange
        $credentials = [
            'email' => 'david.john@noreply.com',
            'password' => 'password',
        ];

        // Act
        $response = $this->post('/api/login', $credentials);

        // Assert
        $response->assertStatus(200)
                 ->assertJsonStructure(['token_type','expires_in','access_token','refresh_token']);
    }

    /**
     * Test to ensure that the user can't login with incorrect credentials.
     *
     * @return void
     */
    public function testUserLoginFailure()
    {
        // Arrange
        $credentials = [
            'email' => 'david.john2@noreply.com',
            'password' => 'password'
        ];

        // Act
        $response = $this->post('/api/login', $credentials);

        // Assert
        $response->assertStatus(401);
    }
}
