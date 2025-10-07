<?php

namespace Database\Factories;

use App\Models\CarCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'   => CarCategory::factory(),
            'brand'         => fake()->company(),
            'model'         => fake()->word(),
            'license_plate' => strtoupper(fake()->bothify('?? ####')),
            'year'          => fake()->year(),
            'price_per_day' => fake()->randomFloat(2, 300000, 1500000),
            'status'        => fake()->randomElement(['available', 'rented', 'maintenance']),
            'image'         => 'https://dummyimage.com/640x480/FFF.png&text=Car+Image',
            'description'   => fake()->text(),
        ];
    }
}
