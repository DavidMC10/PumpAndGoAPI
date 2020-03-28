<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Passport;
use Tests\TestCase;

class FuelStationTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    public $mockConsoleOutput = false;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * Test to ensure that the user can get nearby fuel stations.
     *
     * @return void
     */
    public function testGetNearbyFuelStationsSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'latitude' => 53.349248,
            'longitude' => -6.270747,
            'max_distance_limit' => 20,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getnearbystations', $body);

        // Assert
        $response->assertStatus(200)
                 ->assertJsonStructure(['data']);
    }

    /**
     * Test to ensure that the user can't submit a blank latitude.
     *
     * @return void
     */
    public function testGetNearbyFuelStationsFail1()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'latitude' => null,
            'longitude' => -6.270747,
            'max_distance_limit' => 20,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getnearbystations', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't submit a blank longitude.
     *
     * @return void
     */
    public function testGetNearbyFuelStationsFail2()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'latitude' => 53.349248,
            'longitude' => null,
            'max_distance_limit' => 20
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getnearbystations', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't submit a blank max_distance_limit.
     *
     * @return void
     */
    public function testGetNearbyFuelStationsFail3()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'latitude' => 53.349248,
            'longitude' => -6.270747,
            'max_distance_limit' => null
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getnearbystations', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user gets a 404 with invalid coordinates.
     *
     * @return void
     */
    public function testGetNearbyFuelStationsFail4()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'latitude' => 100.349248,
            'longitude' => -6.270747,
            'max_distance_limit' => 20
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getnearbystations', $body);

        // Assert
        $response->assertStatus(404);
    }

    /**
     * Test to ensure that the user gets the fuel station details when they are at it.
     *
     * @return void
     */
    public function testGetCurrentFuelStationSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'latitude' => 53.361110,
            'longitude' => -6.291575,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getcurrentstation', $body)
            ->assertJsonStructure(['fuel_station_id', 'name', 'number_of_pumps']);

        // Assert
        $response->assertStatus(200);
    }

    /**
     * Test to ensure that the user can't submit a blank latitude.
     *
     * @return void
     */
    public function testGetCurrentFuelStationFail1()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'latitude' => null,
            'longitude' => -6.270747,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getcurrentstation', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't submit a blank longitude.
     *
     * @return void
     */
    public function testGetCurrentFuelStationFail2()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'latitude' => 100.349248,
            'longitude' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getcurrentstation', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user gets a 404 with invalid coordinates.
     *
     * @return void
     */
    public function testGetCurrentFuelStationFail3()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'latitude' => 100.349248,
            'longitude' => 56.232323,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getcurrentstation', $body);

        // Assert
        $response->assertStatus(404);
    }
}
