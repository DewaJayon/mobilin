<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Inertia\Testing\AssertableInertia as AssertInertia;

uses(RefreshDatabase::class);

it('admin can access user page', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($admin)->get(route('dashboard.user.index'));

    $response->assertOk();
    $response->assertInertia(
        fn(AssertInertia $page) =>
        $page->component('Dashboard/User/Index')
    );
});

it('staff can not access user page', function () {
    $staff = User::factory()->create(['role' => 'staff']);

    $response = $this->actingAs($staff)->get(route('dashboard.user.index'));

    $response->assertForbidden();
});

it('guest can not access user page', function () {
    $response = $this->get(route('dashboard.user.index'));

    $response->assertRedirect(route('login'));
});

it('admin can search user by name', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($admin)->get(route('dashboard.user.index', ['search' => 'admin']));

    $response->assertOk();
    $response->assertInertia(
        fn(AssertInertia $page) =>
        $page->component('Dashboard/User/Index')
    );
});

it('admin can search user by email', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($admin)->get(route('dashboard.user.index', ['search' => $admin->email]));

    $response->assertOk();
    $response->assertInertia(
        fn(AssertInertia $page) =>
        $page->component('Dashboard/User/Index')
    );
});

it('admin can search user by role', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($admin)->get(
        route('dashboard.user.index', ['search' => $admin->role])
    );

    expect($response->status())->toBe(200);

    $response->assertOk();
});

it('renders user index page with pagination', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    User::factory(15)->create();

    $response = $this->actingAs($admin)
        ->get(route('dashboard.user.index'));

    $response->assertOk();

    $response->assertInertia(
        fn(AssertInertia $page) =>
        $page->component('Dashboard/User/Index')
            ->has('users.data') // user data
            ->has('users.links') // pagination links
    );
});

it('can search users by name, email, or role', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    User::factory()->create(['name' => 'Jane Doe', 'email' => 'jane@example.com', 'role' => 'staff']);
    User::factory()->create(['name' => 'John Admin', 'email' => 'admin@example.com', 'role' => 'admin']);
    User::factory()->create(['name' => 'Customer X', 'email' => 'cx@example.com', 'role' => 'customer']);

    $response = $this->actingAs($admin)
        ->get(route('dashboard.user.index', ['search' => 'Jane']));

    $response->assertInertia(
        fn(AssertInertia $page) =>
        $page->component('Dashboard/User/Index')
            ->where('users.data.0.name', 'Jane Doe')
    );

    $response = $this->actingAs($admin)
        ->get(route('dashboard.user.index', ['search' => 'admin']));

    $response->assertInertia(
        fn(AssertInertia $page) =>
        $page->component('Dashboard/User/Index')
            ->where('users.data.0.role', 'admin')
    );
});

it('respects per_page parameter', function () {

    $admin = User::factory()->create(['role' => 'admin']);

    User::factory(25)->create();

    $response = $this->actingAs($admin)
        ->get(route('dashboard.user.index', ['per_page' => 5]));

    $response->assertInertia(
        fn(AssertInertia $page) =>
        $page->component('Dashboard/User/Index')
            ->where('users.per_page', 5)
    );
});

it('admin can create user', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($admin)
        ->post(route('dashboard.user.store'), [
            'name'      => 'Test',
            'email'     => 'test@example',
            'password'  => 'password',
            'password_confirmation' => 'password',
            'phone'     => '08123456789',
            'address'   => 'Jl. Test',
            'role'      => 'customer',
        ]);


    $this->assertDatabaseHas('users', [
        'name'      => 'Test',
        'email'     => 'test@example',
        'phone'     => '08123456789',
        'address'   => 'Jl. Test',
        'role'      => 'customer',
    ]);

    $response->assertRedirect(route('dashboard.user.index'));
    $response->assertSessionHas('success', 'User berhasil ditambahkan');
});

it('shows create user form with validation errors', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $response = $this->from(route('dashboard.user.index'))
        ->actingAs($admin)
        ->post(route('dashboard.user.store'), [
            'name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => '',
            'role' => '',
        ]);

    $response->assertSessionHasErrors(['name', 'email', 'password', 'role']);
    $this->assertDatabaseMissing('users', ['email' => '']);

    $response->assertRedirect(route('dashboard.user.index'));
});

it('admin can update user', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $user = User::factory()->create();

    $response = $this->actingAs($admin)
        ->put(route('dashboard.user.update', $user), [
            'name'      => 'Test',
            'email'     => 'test@example',
            'phone'     => '08123456789',
            'address'   => 'Jl. Test',
            'role'      => 'customer',
        ]);

    $this->assertDatabaseHas('users', [
        'name'      => 'Test',
        'email'     => 'test@example',
        'phone'     => '08123456789',
        'address'   => 'Jl. Test',
        'role'      => 'customer',
    ]);

    $response->assertRedirect(route('dashboard.user.index'));
    $response->assertSessionHas('success', 'User berhasil diupdate');
});

it('shows update user form with validation errors', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $user = User::factory()->create();

    $response = $this->from(route('dashboard.user.index'))
        ->actingAs($admin)
        ->put(route('dashboard.user.update', $user), [
            'name' => '',
            'email' => '',
            'role' => '',
        ]);

    $response->assertSessionHasErrors(['name', 'email', 'role']);
    $this->assertDatabaseMissing('users', ['email' => '']);

    $response->assertRedirect(route('dashboard.user.index'));
});

it('admin can delete user', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $user = User::factory()->create();

    $response = $this->actingAs($admin)
        ->delete(route('dashboard.user.destroy', $user));

    $this->assertDatabaseMissing('users', [
        'id' => $user->id
    ]);

    expect($response->status())->toBe(302);

    $response->assertRedirect(route('dashboard.user.index'));
});

it('admin can reset user password', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $user = User::factory()->create();

    $response = $this->actingAs($admin)
        ->patch(route('dashboard.user.reset-password', $user), [
            'password' => 'password',
        ]);

    $user->refresh();

    expect(Hash::check('password', $user->password))->toBeTrue();

    $response->assertRedirect(route('dashboard.user.index'));
    $response->assertSessionHas('success', 'Password berhasil direset');
});
