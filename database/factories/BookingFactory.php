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

        $startDate = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $endDate = (clone $startDate)->modify('+' . rand(1, 7) . ' days');

        $car = Car::inRandomOrder()->first();

        return [
            'user_id'           => User::inRandomOrder()->first()->id,
            'car_id'            => $car ? $car->id : Car::factory(),
            'start_date'        => $startDate->format('Y-m-d'),
            'end_date'          => $endDate->format('Y-m-d'),
            'total_price'       => $car ? $car->price_per_day * rand(1, 7) : rand(500000, 1500000),
            'status'            => $this->faker->randomElement(['pending', 'confirmed', 'ongoing', 'returned', 'cancelled']),
            'payment_status'    => $this->faker->randomElement(['unpaid', 'paid', 'refunded']),
            'notes'             => $this->faker->optional()->text(),
        ];
    }
}
