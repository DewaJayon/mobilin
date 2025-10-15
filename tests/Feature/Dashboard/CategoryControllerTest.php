<?php

use App\Models\CarCategory;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

use Inertia\Testing\AssertableInertia as Assert;
use function Pest\Laravel\assertDatabaseMissing;

it('dashboard category page can be rendered by admin', function () {

    $admin = User::factory()->create(['role' => 'admin']);

    actingAs($admin)
        ->get(route('dashboard.category.index'))
        ->assertSuccessful()
        ->assertInertia(
            fn(Assert $page) =>
            $page->component('Dashboard/Category/Index')
        );
});

it('dashboard category page can not be rendered by admin', function () {

    $staff = User::factory()->create(['role' => 'staff']);

    actingAs($staff)
        ->get(route('dashboard.category.index'))
        ->assertForbidden();
});

it('dashboard category create page should be not found', function () {

    $admin = User::factory()->create(['role' => 'admin']);

    actingAs($admin)
        ->get(route('dashboard.category.create'))
        ->assertNotFound();
});

it('admin can create new category', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    actingAs($admin)
        ->post(route('dashboard.category.store'), [
            'name'          => 'Category A',
            'slug'          => 'category-a',
            'description'   => 'Category A description',
        ])
        ->assertRedirect(route('dashboard.category.index'));

    assertDatabaseHas('car_categories', [
        'name'          => 'Category A',
        'slug'          => 'category-a',
        'description'   => 'Category A description',
    ]);
});

it('staff can not create new category', function () {
    $staff = User::factory()->create(['role' => 'staff']);

    actingAs($staff)
        ->post(route('dashboard.category.store'), [
            'name'          => 'Category A',
            'slug'          => 'category-a',
            'description'   => 'Category A description',
        ])
        ->assertForbidden();

    assertDatabaseMissing('car_categories', [
        'name'          => 'Category A',
        'slug'          => 'category-a',
        'description'   => 'Category A description',
    ]);
});

it('show validation error when create new category', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    actingAs($admin)
        ->post(route('dashboard.category.store'), [
            'name'          => '',
        ])
        ->assertSessionHasErrors(['name']);
});

it('dashboard category show page should be not found', function () {

    $admin = User::factory()->create(['role' => 'admin']);

    actingAs($admin)
        ->get(route('dashboard.category.show', 1))
        ->assertNotFound();
});

it('dashboard category edit page should be not found', function () {

    $admin = User::factory()->create(['role' => 'admin']);

    actingAs($admin)
        ->get(route('dashboard.category.edit', 1))
        ->assertNotFound();
});

it('admin can delete category', function () {

    $admin = User::factory()->create(['role' => 'admin']);

    $category = CarCategory::factory()->create();

    actingAs($admin)
        ->delete(route('dashboard.category.destroy', $category->slug))
        ->assertRedirect(route('dashboard.category.index'));

    assertDatabaseMissing('car_categories', [
        'slug' => $category->slug,
    ]);
});

it('staff can not delete category', function () {

    $staff = User::factory()->create(['role' => 'staff']);

    $category = CarCategory::factory()->create();

    actingAs($staff)
        ->delete(route('dashboard.category.destroy', $category->slug))
        ->assertForbidden();

    assertDatabaseHas('car_categories', [
        'slug' => $category->slug,
    ]);
});

it('admin can update category', function () {

    $admin = User::factory()->create(['role' => 'admin']);

    $category = CarCategory::factory()->create([
        'name'          => 'test',
        'slug'          => 'test',
        'description'   => 'test',
    ]);

    actingAs($admin)
        ->put(route('dashboard.category.update', $category->slug), [
            'name'          => 'test',
            'description'   => 'Category A description',
        ])
        ->assertRedirect(route('dashboard.category.index'));

    assertDatabaseHas('car_categories', [
        'name'          => 'test',
        'slug'          => 'test',
        'description'   => 'Category A description',
    ]);
});

it('slug should be change when name is changed', function () {

    $admin = User::factory()->create(['role' => 'admin']);

    $category = CarCategory::factory()->create([
        'name'          => 'test',
        'slug'          => 'test',
        'description'   => 'test',
    ]);

    actingAs($admin)
        ->put(route('dashboard.category.update', $category->slug), [
            'name'          => 'test updated',
            'description'   => 'Category A description',
        ])
        ->assertRedirect(route('dashboard.category.index'));

    assertDatabaseHas('car_categories', [
        'name'          => 'test updated',
        'slug'          => 'test-updated',
        'description'   => 'Category A description',
    ]);
});

it('staff can not update category', function () {

    $staff = User::factory()->create(['role' => 'staff']);

    $category = CarCategory::factory()->create([
        'name'          => 'test',
        'slug'          => 'test',
        'description'   => 'test',
    ]);

    actingAs($staff)
        ->put(route('dashboard.category.update', $category->slug), [
            'name'          => 'test updated',
            'description'   => 'Category A description',
        ])
        ->assertForbidden();

    expect($category->fresh()->name)->toBe('test');
});
