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

    public $mockConsoleOutput = false;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');

        $this->artisan('passport:client', ['--password' => null, '--no-interaction' => true]);
        $this->artisan('passport:keys', ['--no-interaction' => true]);
    }

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
        $response = $this->json('POST', '/api/login', $credentials);

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['token_type', 'expires_in', 'access_token', 'refresh_token']);
    }

    /**
     * Test to ensure that the user can't login with incorrect credentials.
     *
     * @return void
     */
    public function testUserLoginFailure1()
    {
        // Arrange
        $credentials = [
            'email' => 'david.john2@noreply.com',
            'password' => 'password'
        ];

        // Act
        $response = $this->json('POST', '/api/login', $credentials);

        // Assert
        $response->assertStatus(401);
    }

    /**
     * Test to ensure that the user can't leave email blank.
     *
     * @return void
     */
    public function testUserLoginFailure2()
    {
        // Arrange
        $credentials = [
            'email' => null,
            'password' => 'password'
        ];

        // Act
        $response = $this->json('POST', '/api/login', $credentials);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't leave password blank.
     *
     * @return void
     */
    public function testUserLoginFailure3()
    {
        // Arrange
        $credentials = [
            'email' => 'david.john2@noreply.com',
            'password' => null
        ];

        // Act
        $response = $this->json('POST', '/api/login', $credentials);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can register.
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
        $response = $this->json('POST', '/api/register', $credentials);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('user', [
            'email' => 'david.test@noreply.com'
        ]);
    }

    /**
     * Test to ensure that the user can't register with an already registered email.
     *
     * @return void
     */
    public function testUserRegisterFail1()
    {
        // Arrange
        $credentials = [
            'email' => 'david.john@noreply.com',
            'password' => 'password',
            'first_name' => 'David',
            'last_name' => 'McElhinney'
        ];

        // Act
        $response = $this->json('POST', '/api/register', $credentials);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that email can't be blank.
     *
     * @return void
     */
    public function testUserRegisterFail2()
    {
        // Arrange
        $credentials = [
            'email' => null,
            'password' => 'password',
            'first_name' => 'David',
            'last_name' => 'McElhinney'
        ];

        // Act
        $response = $this->json('POST', '/api/register', $credentials);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that password can't be blank.
     *
     * @return void
     */
    public function testUserRegisterFail3()
    {
        // Arrange
        $credentials = [
            'email' => 'david.john@noreply.com',
            'password' => null,
            'first_name' => 'David',
            'last_name' => 'McElhinney'
        ];

        // Act
        $response = $this->json('POST', '/api/register', $credentials);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that first_name can't be blank.
     *
     * @return void
     */
    public function testUserRegisterFail4()
    {
        // Arrange
        $credentials = [
            'email' => 'david.john@noreply.com',
            'password' => 'password',
            'first_name' => null,
            'last_name' => 'McElhinney'
        ];

        // Act
        $response = $this->json('POST', '/api/register', $credentials);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that last_name can't be blank.
     *
     * @return void
     */
    public function testUserRegisterFail5()
    {
        // Arrange
        $credentials = [
            'email' => 'david.john@noreply.com',
            'password' => 'password',
            'first_name' => 'David',
            'last_name' => null
        ];

        // Act
        $response = $this->json('POST', '/api/register', $credentials);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure the user can logout.
     *
     * @return void
     */
    public function testUserLogoutSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', '/api/logout');

        // Assert
        $response->assertStatus(200);
    }

    /**
     * Test to ensure the user can send a password reset link.
     *
     * @return void
     */
    public function testUserSendPasswordResetLinkSuccess()
    {
        // Arrange
        $credentials = [
            'email' => 'david.john@noreply.com',
        ];

        // Act
        $response = $this->json('POST', '/api/createpasswordresettoken', $credentials);

        // Assert
        $response->assertStatus(200);
    }

    /**
     * Test to ensure the user gets a 404 if the user is not found.
     *
     * @return void
     */
    public function testUserSendPasswordResetLinkFail1()
    {
        // Arrange
        $credentials = [
            'email' => 'david.john22@noreply.com',
        ];

        // Act
        $response = $this->json('POST', '/api/createpasswordresettoken', $credentials);

        // Assert
        $response->assertStatus(404);
    }

    /**
     * Test to ensure the user can't leave the email blank.
     *
     * @return void
     */
    public function testUserSendPasswordResetLinkFail2()
    {
        // Arrange
        $credentials = [
            'email' => null,
        ];

        // Act
        $response = $this->json('POST', '/api/createpasswordresettoken', $credentials);

        // Assert
        $response->assertStatus(422);
    }
}
