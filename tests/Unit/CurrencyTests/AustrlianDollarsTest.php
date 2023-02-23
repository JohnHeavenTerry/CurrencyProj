<?php
use Tests\TestCase;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Capsule\Manager as DB;


class AustrlianDollarsTest extends TestCase
{
    public function setUp(): void {
        parent::setUp();
        $this->currency = Currency::newFactory();
        $this->user = User::Factory();

        Config::set('currency', true);
    }

    /**
     * call australian dollars endpoint to ensure its passing back the right currency
     * Not sure how to test the other values without saving into DB
     * so left this as static string only.
     *
     * @return void
     */
    public function test_assert_endpoint_returns_australian_dollar()
    {
        // ACT -- ASSERT
        $this->get('/currency/australian-dollars')
            ->assertStatus(200)
            ->assertJson([
                [
                    'targetName' => 'Australian Dollar',
                    'baseName' => 'U.K. Pound Sterling',
                    'targetCurrency' => Currency::AUS
                ]
            ]);
    }
}
