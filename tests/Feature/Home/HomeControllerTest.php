<?php

use Inertia\Testing\AssertableInertia;

test('renders the home page with the correct inertia component', function () {
    $response = $this->get(route('home'));

    $response->assertStatus(200);

    $response->assertInertia(
        fn(AssertableInertia $page) =>
        $page->component('Home/Index')
    );
});
