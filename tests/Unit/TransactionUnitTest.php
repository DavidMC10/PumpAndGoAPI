<?php

namespace Tests\Unit;

use App\Transaction;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Passport;
use Tests\TestCase;

class TransactionUnitTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    public $mockConsoleOutput = false;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * Test to ensure that the fuel_amount can't be blank.
     *
     * @return void
     */
    public function testCreateChargeFail()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'fuel_amount' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/createcharge', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the fuel_station_id can't be blank.
     *
     * @return void
     */
    public function testCreateTransactionFail1()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'fuel_station_id' => null,
            'fuel_amount' => 20,
            'pump_number' => 3,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/createtransaction', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the fuel_amount can't be blank.
     *
     * @return void
     */
    public function testCreateTransactionFail2()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'fuel_station_id' => 2,
            'fuel_amount' => null,
            'pump_number' => 3,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/createtransaction', $body);

        // Assert
        $response->assertStatus(422);
    }


    /**
     * Test to ensure that the pump_number can't be blank
     *
     * @return void
     */
    public function testCreateTransactionFail3()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'fuel_station_id' => 2,
            'fuel_amount' => 20,
            'pump_number' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/createtransaction', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user 404 is returned upon no transactions.
     *
     * @return void
     */
    public function testCreateTransactionHistoryFail()
    {
        // Arrange
        $user = factory(User::class)->create();

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/gettransactionhistory');

        // Assert
        $response->assertStatus(404);
    }

    /**
     * Test to ensure that the user 404 is returned upon no recent transaction id.
     *
     * @return void
     */
    public function testGetRecentTransactionIdFail()
    {
        // Arrange
        $user = factory(User::class)->create();

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getrecenttransactionid');

        // Assert
        $response->assertStatus(404);
    }

    /**
     * Test to ensure that the user can't leave the transaction_id blank.
     *
     * @return void
     */
    public function testGetReceiptFail()
    {
        // Arrange
        $user = factory(User::class)->create();
        $transactionData = [
            'transaction_id' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getreceipt', $transactionData);

        // Assert
        $response->assertStatus(422);
    }
}
