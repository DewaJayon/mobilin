<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as AssertInertia;

uses(RefreshDatabase::class);

it('allows admin to access dashboard', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($admin)->get(route('dashboard.index'));

    $response->assertOk();
    $response->assertInertia(
        fn(AssertInertia $page) =>
        $page->component('Dashboard/Dashboard/Index')
    );
});

it('allows staff to access dashboard', function () {
    $staff = User::factory()->create(['role' => 'staff']);

    $response = $this->actingAs($staff)->get(route('dashboard.index'));

    $response->assertOk();
    $response->assertInertia(
        fn(AssertInertia $page) =>
        $page->component('Dashboard/Dashboard/Index')
    );
});

it('denies customer to access dashboard', function () {
    $customer = User::factory()->create(['role' => 'customer']);

    $response = $this->actingAs($customer)->get(route('dashboard.index'));

    $response->assertForbidden();
});
