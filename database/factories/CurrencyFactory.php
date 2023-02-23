<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => fake()->name,
            'date' => fake()->date,
            'currency' => fake()->name,
        ];
    }

    /**
     * @return string[]
     * Set the type to be australian dollar when calling state
     */
    public function australianState() {
        return [
            'type' => 'AUD'
        ];
    }
}
