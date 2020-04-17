<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Passport;
use Mockery\Generator\StringManipulation\Pass\Pass;
use Stripe\PaymentMethod;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    public $mockConsoleOutput = false;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * Test to ensure that the user can add a Stripe card.
     *
     * @return void
     */
    public function testAddStripeCardSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'card_number' => 4242424242424242,
            'exp_month' => 07,
            'exp_year' => 23,
            'cvc' => 123
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/addstripecard', $body);

        // Assert
        $response->assertStatus(200);
    }

    /**
     * Test to ensure that the user can't submit a blank card_number.
     *
     * @return void
     */
    public function testAddStripeCardFail1()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'card_number' => null,
            'exp_month' => 07,
            'exp_year' => 23,
            'cvc' => 123
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/addstripecard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't submit a blank exp_month.
     *
     * @return void
     */
    public function testAddStripeCardFail2()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'card_number' => 4242424242424242,
            'exp_month' => null,
            'exp_year' => 23,
            'cvc' => 123
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/addstripecard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't submit a blank exp_year.
     *
     * @return void
     */
    public function testAddStripeCardFail3()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'card_number' => 4242424242424242,
            'exp_month' => 07,
            'exp_year' => null,
            'cvc' => 123
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/addstripecard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't submit a blank cvc.
     *
     * @return void
     */
    public function testAddStripeCardFail4()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'card_number' => 4242424242424242,
            'exp_month' => 07,
            'exp_year' => 23,
            'cvc' => null
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/addstripecard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can update a Stripe card.
     *
     * @return void
     */
    public function testUpdateStripeCardSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'card_id' => 'pm_1GROefHgruvyRZKpPCJl4jsa',
            'exp_month' => 12,
            'exp_year' => 29,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatestripecard', $body);

        // Assert
        $response->assertStatus(200);
    }

    /**
     * Test to ensure that the user can't submit a blank card_id.
     *
     * @return void
     */
    public function testUpdateStripeCardFail1()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'card_id' => null,
            'exp_month' => 12,
            'exp_year' => 29,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatestripecard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't submit a blank exp_month.
     *
     * @return void
     */
    public function testUpdateStripeCardFail2()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'card_id' => 'pm_1GROefHgruvyRZKpPCJl4jsa',
            'exp_month' => null,
            'exp_year' => 29,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatestripecard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't submit a blank card_id.
     *
     * @return void
     */
    public function testUpdateStripeCardFail3()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'card_id' => 'pm_1GROefHgruvyRZKpPCJl4jsa',
            'exp_month' => 12,
            'exp_year' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatestripecard', $body);

        // Assert
        $response->assertStatus(422);
    }


    /**
     * Test to ensure that the user can delete a Stripe card.
     *
     * @return void
     */
    public function testDeleteStripeCardSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $card = [
            'card_number' => 4242424242424242,
            'exp_month' => 07,
            'exp_year' => 23,
            'cvc' => 123
        ];

        // Act
        Passport::actingAs($user);

        // Create a payment method.
        $card = PaymentMethod::create([
            'type' => 'card',
            'card' => [
                'number' => $card['card_number'],
                'exp_month' => $card['exp_month'],
                'exp_year' => $card['exp_year'],
                'cvc' => $card['cvc'],
            ],
        ]);

        // Get the card id from the card object.
        $cardId = $card->id;

        // Retrieve the payment method from the card id.
        $paymentMethod = PaymentMethod::retrieve(
            $cardId
        );

        // Attach the payment method to the customer.
        $paymentMethod->attach([
            'customer' => $user->stripe_customer_id,
        ]);

        // Pass the payment method to delete.
        $response = $this->json('POST', 'api/deletestripecard', ['card_id' => $cardId]);

        // Assert
        $response->assertStatus(200);
    }

    /**
     * Test to ensure that the user can't leave the card_id field blank.
     *
     * @return void
     */
    public function testDeleteStripeCardFail()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'card_id' => null
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/deletestripecard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can add a fuel card.
     *
     * @return void
     */
    public function testAddFuelCardSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'fuel_card_no' => '4276289823412983',
            'exp_month' => '12',
            'exp_year' => '28',
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/addfuelcard', $body);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('fuel_card', [
            'fuel_card_no' => '4276289823412983',
            'expiry_month' => '12',
            'expiry_year' => '28',
        ]);
    }

    /**
     * Test to ensure that the user can't leave fuel_card_no blank.
     *
     * @return void
     */
    public function testAddFuelCardFail1()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'fuel_card_no' => null,
            'exp_month' => '12',
            'exp_year' => '28',
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/addfuelcard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't leave exp_month blank.
     *
     * @return void
     */
    public function testAddFuelCardFail2()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'fuel_card_no' => '4276289823412983',
            'exp_month' => null,
            'exp_year' => '28',
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/addfuelcard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't leave exp_year blank.
     *
     * @return void
     */
    public function testAddFuelCardFail3()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'fuel_card_no' => '4276289823412983',
            'exp_month' => '12',
            'exp_year' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/addfuelcard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can update a fuel card.
     *
     * @return void
     */
    public function testUpdateFuelCardSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'exp_month' => '11',
            'exp_year' => '29',
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatefuelcard', $body);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('fuel_card', [
            'fuel_card_no' => null,
            'expiry_month' => '11',
            'expiry_year' => '29',
        ]);
    }

    /**
     * Test to ensure that the user can't submit an empty exp_month.
     *
     * @return void
     */
    public function testUpdateFuelCardFail1()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'exp_month' => null,
            'exp_year' => '29',
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatefuelcard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can't submit an empty exp_year.
     *
     * @return void
     */
    public function testUpdateFuelCardFail2()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'exp_month' => '11',
            'exp_year' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/updatefuelcard', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Test to ensure that the user can delete a fuel card.
     *
     * @return void
     */
    public function testDeleteFuelCardSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/deletefuelcard');

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('fuel_card', [
            'fuel_card_no' => null,
            'expiry_month' => null,
            'expiry_year' => null,
        ]);
    }

    /**
     * Test to ensure that the user can set a default payment method.
     *
     * @return void
     */
    public function testSetDefaultPaymentMethodSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'default_payment_method' => 11,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/setdefaultpaymentmethod', $body);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('user', [
            'default_payment_method' => 11,
        ]);
    }

    /**
     * Test to ensure that the user can't set a blank default payment method.
     *
     * @return void
     */
    public function testSetDefaultPaymentMethodFail()
    {
        // Arrange
        $user = factory(User::class)->create();
        $body = [
            'default_payment_method' => null,
        ];

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/setdefaultpaymentmethod', $body);

        // Assert
        $response->assertStatus(422);
    }

    /**
     * Get the user's default payment method.
     *
     * @return void
     */
    public function getDefaultPaymentMethodSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/getdefaultpaymentmethod');

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['card_id']);
    }

    /**
     * Get the user's payment methods.
     *
     * @return void
     */
    public function getPaymentMethodsSuccess()
    {
        // Arrange
        $user = factory(User::class)->create();

        // Act
        Passport::actingAs($user);
        $response = $this->json('POST', 'api/retrievepaymentmethods');

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['card_id', 'brand', 'last4']);
    }
}
