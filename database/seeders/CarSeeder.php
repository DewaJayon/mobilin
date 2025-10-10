<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Car::factory(30)->create();

        $cars = database_path('json/cars.json');
        $json = file_get_contents($cars);
        $cars = json_decode($json);

        foreach ($cars as $car) {
            Car::create([
                'category_id'   => $car->category_id,
                'brand'         => $car->brand,
                'model'         => $car->model,
                'slug'          => $car->brand . '-' . $car->model,
                'license_plate' => $car->license_plate,
                'year'          => $car->year,
                'price_per_day' => $car->price_per_day,
                'status'        => $car->status,
                'fuel_type'     => $car->fuel_type,
                'seats'         => $car->seats,
                'transmission'  => $car->transmission,
                'image'         => "https://dummyimage.com/600x400/9c9c9c/000&text={$car->model}",
                'description'   => $car->description,
            ]);
        }
    }
}
