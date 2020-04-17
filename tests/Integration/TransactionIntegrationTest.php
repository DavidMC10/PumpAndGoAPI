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

class TransactionIntegrationTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    public $mockConsoleOutput = false;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * Test to ensure that the user can create a charge with their fuel card.
     *
     * @return void
     */
    public function testCreateChargeOnFuelCardSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $fuelAmount = [
            'fuel_amount' => 20,
        ];
        $cardDetails = [
            'fuel_card_no' => '4276289823412983',
            'exp_month' => '12',
            'exp_year' => '28',
        ];

        // Act
        Passport::actingAs($user);
        $this->json('POST', 'api/addfuelcard', $cardDetails);
        $this->json('POST', 'api/getdefaultpaymentmethod');
        $response = $this->json('POST', 'api/createcharge', $fuelAmount);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('fuel_card', [
            'fuel_card_no' => 4276289823412983,
            'expiry_month' => 12,
            'expiry_year' => 28,
        ]);
        $this->assertDatabaseHas('user', [
            'default_payment_method' => $user->default_payment_method,
        ]);
    }

    /**
     * Test to ensure that the user can create a charge with their debit/credit card.
     *
     * @return void
     */
    public function testCreateChargeOnStripeCardSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $fuelAmount = [
            'fuel_amount' => 20,
        ];
        $cardDetails = [
            'card_number' => 4242424242424242,
            'exp_month' => 07,
            'exp_year' => 23,
            'cvc' => null
        ];

        // Act
        Passport::actingAs($user);
        $this->json('POST', 'api/addstripecard', $cardDetails);
        $this->json('POST', 'api/getdefaultpaymentmethod');
        $response = $this->json('POST', 'api/createcharge', $fuelAmount);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('user', [
            'default_payment_method' => $user->default_payment_method,
        ]);
    }

    /**
     * Test to ensure that the user can create a transaction with a fuel card.
     *
     * @return void
     */
    public function testCreateTransactionWithFuelCardSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $fuelAmount = [
            'fuel_amount' => 20,
        ];
        $cardDetails = [
            'fuel_card_no' => '4276289823412983',
            'exp_month' => '12',
            'exp_year' => '28',
        ];
        $transactionDetails = [
            'fuel_station_id' => 2,
            'fuel_amount' => 20,
            'pump_number' => 3,
        ];

        // Act
        Passport::actingAs($user);
        $this->json('POST', 'api/addfuelcard', $cardDetails);
        $this->json('POST', 'api/getdefaultpaymentmethod');
        $this->json('POST', 'api/createcharge', $fuelAmount);
        $response = $this->json('POST', 'api/createtransaction', $transactionDetails);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('fuel_card', [
            'fuel_card_no' => 4276289823412983,
            'expiry_month' => 12,
            'expiry_year' => 28,
        ]);
        $this->assertDatabaseHas('user', [
            'default_payment_method' => $user->default_payment_method,
        ]);
    }

    /**
     * Test to ensure that the user can create a transaction with a debit/credit card.
     *
     * @return void
     */
    public function testCreateTransactionWithStripeCardSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $fuelAmount = [
            'fuel_amount' => 20,
        ];
        $cardDetails = [
            'card_number' => 4242424242424242,
            'exp_month' => 07,
            'exp_year' => 23,
            'cvc' => null
        ];
        $transactionDetails = [
            'fuel_station_id' => 2,
            'fuel_amount' => 20,
            'pump_number' => 3,
        ];

        // Act
        Passport::actingAs($user);
        $this->json('POST', 'api/addstripecard', $cardDetails);
        $this->json('POST', 'api/getdefaultpaymentmethod');
        $this->json('POST', 'api/createcharge', $fuelAmount);
        $response = $this->json('POST', 'api/createtransaction', $transactionDetails);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('user', [
            'default_payment_method' => $user->default_payment_method,
        ]);
    }

    /**
     * Test to ensure that the user can get their transaction history.
     *
     * @return void
     */
    public function testCreateTransactionHistorySuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $cardDetails = [
            'fuel_card_no' => '4276289823412983',
            'exp_month' => '12',
            'exp_year' => '28',
        ];
        $chargeData = [
            'fuel_amount' => 20,
        ];
        $transactionData = [
            'fuel_station_id' => 2,
            'fuel_amount' => 20,
            'pump_number' => 3,
        ];

        // Act
        Passport::actingAs($user);
        $this->json('POST', 'api/addfuelcard', $cardDetails);
        $this->json('POST', 'api/getdefaultpaymentmethod');
        $this->json('POST', 'api/createcharge', $chargeData);
        $this->json('POST', 'api/createtransaction', $transactionData);
        $response = $this->json('POST', 'api/gettransactionhistory');

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    /**
     * Test to ensure that the user can get the transaction_id of the most recent transaction.
     *
     * @return void
     */
    public function testGetRecentTransactionIdSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $cardDetails = [
            'fuel_card_no' => '4276289823412983',
            'exp_month' => '12',
            'exp_year' => '28',
        ];
        $chargeData = [
            'fuel_amount' => 20,
        ];
        $transactionData = [
            'fuel_station_id' => 2,
            'fuel_amount' => 20,
            'pump_number' => 3,
        ];

        // Act
        Passport::actingAs($user);
        $this->json('POST', 'api/addfuelcard', $cardDetails);
        $this->json('POST', 'api/getdefaultpaymentmethod');
        $this->json('POST', 'api/createcharge', $chargeData);
        $this->json('POST', 'api/createtransaction', $transactionData);
        $response = $this->json('POST', 'api/getrecenttransactionid');

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['transaction_id']);
    }

    /**
     * Test to ensure that the user can get their Transaction Receipt.
     *
     * @return void
     */
    public function testGetReceiptSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $cardDetails = [
            'fuel_card_no' => '4276289823412983',
            'exp_month' => '12',
            'exp_year' => '28',
        ];
        $chargeData = [
            'fuel_amount' => 20,
        ];
        $transactionData = [
            'fuel_station_id' => 2,
            'fuel_amount' => 20,
            'pump_number' => 3,
        ];

        // Act
        Passport::actingAs($user);
        $this->json('POST', 'api/addfuelcard', $cardDetails);
        $this->json('POST', 'api/getdefaultpaymentmethod');
        $this->json('POST', 'api/createcharge', $chargeData);
        $this->json('POST', 'api/createtransaction', $transactionData);
        $transaction = Transaction::where('user_id', $user->user_id)->orderBy('transaction_id', 'DESC')->first();
        $transacionId =  $transaction->transaction_id;
        $response = $this->json('POST', 'api/getreceipt', ['transaction_id' => $transacionId]);

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure([
                'fuel_station_name', 'fuel_station_address_1', 'fuel_station_address_2', 'fuel_station_address_city_town', 'transaction_date', 'first_name', 'last_name',
                'payment_method', 'pump_number', 'fuel_type', 'number_of_litres', 'price_per_litre', 'discount', 'vat_rate', 'price_excluding_vat', 'vat', 'total_price'
            ]);
    }
}
