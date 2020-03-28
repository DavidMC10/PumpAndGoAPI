<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    public $mockConsoleOutput = false;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * Test to ensure that the user can update their name.
     *
     * @return void
     */
    public function testProfileUpdateNameSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'first_name' => "David",
            'last_name' => "Benjamin",
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatename', $body);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('user', [
            'email' => 'davestests@noreply.com',
            'last_name' => 'Benjamin'
        ]);
    }

    /**
     * Test to ensure that the user can't submit a blank first_name.
     *
     * @return void
     */
    public function testProfileUpdateNameFail1()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'first_name' => null,
            'last_name' => "Benjamin",
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatename', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't submit a blank last_name.
     *
     * @return void
     */
    public function testProfileUpdateNameFail2()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'first_name' => "David",
            'last_name' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatename', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can update their email.
     *
     * @return void
     */
    public function testProfileUpdateEmailSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'email' => "johntravolta@noreply.com",
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updateemail', $body);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('user', [
            'email' => 'johntravolta@noreply.com',
        ]);
    }

    /**
     * Test to ensure that the user can't submit a blank email.
     *
     * @return void
     */
    public function testProfileUpdatEmailFail1()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'email' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updateemail', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't submit an email that already exists.
     *
     * @return void
     */
    public function testProfileUpdatEmailFail2()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'email' => 'kevin.turner@noreply.com',
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updateemail', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can update their password.
     *
     * @return void
     */
    public function testProfileUpdatePasswordSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'password' => "password24",
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatepassword', $body);

        // Assert
        $response->assertStatus(200);
    }

    /**
     * Test to ensure that the user can't submit a blank password.
     *
     * @return void
     */
    public function testProfileUpdatPasswordFail()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'password' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatepassword', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can update the max fuel limit.
     *
     * @return void
     */
    public function testProfileUpdateMaxFuelLimitSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'max_fuel_limit' => 40,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatefuellimit', $body);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('user', [
            'email' => 'davestests@noreply.com',
            'max_fuel_limit' => 40
        ]);
    }

    /**
     * Test to ensure that the user can't submit a blank value.
     *
     * @return void
     */
    public function testProfileUpdateMaxFuelLimitFail()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'max_fuel_limit' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatefuellimit', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can update the max distance limit.
     *
     * @return void
     */
    public function testProfileUpdateMaxDistanceLimitSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'max_distance_limit' => 40,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatedistancelimit', $body);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('user', [
            'email' => 'davestests@noreply.com',
            'max_distance_limit' => 40
        ]);
    }

    /**
     * Test to ensure that the user can't submit a blank value.
     *
     * @return void
     */
    public function testProfileUpdateMaxDistanceLimitFail()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'max_distance_limit' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatedistancelimit', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can retrieve their profile details.
     *
     * @return void
     */
    public function testGetUserProfileDetailsSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getuserprofiledetails');

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['first_name', 'last_name', 'email', 'max_fuel_limit', 'max_distance_limit']);
    }
}
