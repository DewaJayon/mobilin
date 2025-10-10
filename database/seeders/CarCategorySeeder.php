<?php

namespace Database\Seeders;

use App\Models\CarCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CarCategory::factory(20)->create();

        $categories = database_path('json/categories.json');
        $json       = file_get_contents($categories);
        $categories = json_decode($json);

        foreach ($categories as $category) {
            CarCategory::create([
                'name'          => $category->name,
                'slug'          => Str::slug($category->name),
                'description'   => $category->description,
            ]);
        }
    }
}
