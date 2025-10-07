<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'           => User::factory(),
            'car_id'            => Car::factory(),
            'start_date'        => fake()->date(),
            'end_date'          => fake()->date(),
            'total_price'       => fake()->randomFloat(2, 300000, 1500000),
            'status'            => fake()->randomElement(['pending', 'ongoing', 'confirmed', 'cancelled', 'returned']),
            'payment_status'    => fake()->randomElement(['unpaid', 'paid', 'refunded']),
            'notes'             => fake()->text(),
        ];
    }
}
