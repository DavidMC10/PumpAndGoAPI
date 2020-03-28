<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Passport;
use Tests\TestCase;

class RewardTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    public $mockConsoleOutput = false;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * Test to ensure that the user can retrieve their reward details.
     *
     * @return void
     */
    public function testGetUserRewardsSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getrewards');

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['barcode_number', 'car_wash_discount_percentage', 'fuel_discount_percentage', 'deli_discount_percentage', 'coffee_discount_percentage']);
    }

    /**
     * Test to ensure that the user can retrieve the number of visits until a fuel discount.
     *
     * @return void
     */
    public function testGetUserVisitCountSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/visitcount');

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['first_name', 'visit_count']);
    }
}
