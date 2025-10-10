<?php

use App\Models\Car;
use App\Models\CarCategory;
use Inertia\Testing\AssertableInertia;
use function Pest\Laravel\get;

beforeEach(function () {

    Car::query()->delete();
    CarCategory::query()->delete();

    $this->category = CarCategory::factory()->create([
        'name' => 'SUV',
        'slug' => 'suv',
    ]);

    $this->car = Car::factory()->create([
        'brand'         => 'Toyota',
        'model'         => 'Rush',
        'year'          => 2022,
        'price_per_day' => 500000,
        'transmission'  => 'automatic',
        'fuel_type'     => 'bensin',
        'category_id'   => $this->category->id,
    ]);
});

test('catalog screen can be rendered', function () {
    $response = get(route('catalog'));

    $response->assertStatus(200);

    $response->assertInertia(
        fn(AssertableInertia $page) =>
        $page->component('Catalog/Index')
            ->hasAll(['categories', 'fuels', 'transmissions', 'cars', 'filters'])
    );
});

test('catalog shows all categories when all=true', function () {
    CarCategory::factory()->count(3)->create();

    $response = get(route('catalog', ['all' => true]));

    $response->assertInertia(function (AssertableInertia $page) {
        $data = $page->toArray();

        $categories = $data['props']['categories'] ?? [];

        expect($categories)
            ->toBeArray()
            ->and(count($categories))->toBeGreaterThanOrEqual(4);

        $page->component('Catalog/Index');
    });
});

test('catalog can be filtered by search', function () {
    Car::factory()->create(['brand' => 'Honda', 'model' => 'Jazz']);

    $response = get(route('catalog', ['search' => 'Rush']));

    $response->assertInertia(
        fn(AssertableInertia $page) =>
        $page->has('cars.data', 1)
            ->where('cars.data.0.brand', 'Toyota')
    );
});

test('catalog can be filtered by transmission', function () {
    Car::factory()->create(['brand' => 'Honda', 'transmission' => 'manual']);

    $response = get(route('catalog', ['transmission' => 'automatic']));

    $response->assertInertia(
        fn(AssertableInertia $page) =>
        $page->has('cars.data', 1)
            ->where('cars.data.0.transmission', 'automatic')
    );
});

test('catalog can be filtered by fuel', function () {
    Car::factory()->create(['brand' => 'Honda', 'fuel_type' => 'diesel']);

    $response = get(route('catalog', ['fuel' => 'bensin']));

    $response->assertInertia(
        fn(AssertableInertia $page) =>
        $page->has('cars.data', 1)
            ->where('cars.data.0.fuel_type', 'bensin')
    );
});

test('catalog can be filtered by category slug', function () {
    $otherCategory = CarCategory::factory()->create(['slug' => 'sedan']);
    Car::factory()->create(['category_id' => $otherCategory->id]);

    $response = get(route('catalog', ['category' => 'suv']));

    $response->assertInertia(
        fn(AssertableInertia $page) =>
        $page->has('cars.data', 1)
            ->where('cars.data.0.category.slug', 'suv')
    );
});

test('catalog can be sorted by price ascending', function () {
    Car::factory()->create(['brand' => 'Honda', 'price_per_day' => 300000]);
    Car::factory()->create(['brand' => 'Mazda', 'price_per_day' => 800000]);
    $this->car->update(['price_per_day' => 500000]);

    $response = get(route('catalog', ['sort' => 'price-asc']));

    $response->assertInertia(
        fn(AssertableInertia $page) =>
        $page->has('cars.data')
            ->where('cars.data.0.price_per_day', 300000)
    );
});
