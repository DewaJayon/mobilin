<?php

namespace Database\Seeders;

use App\Models\CarCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarCategory::factory(20)->create();
    }
}
