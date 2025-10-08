<?php

use Inertia\Testing\AssertableInertia;

test('catalog screen can be rendered', function () {
    $response = $this->get(route('catalog'));

    $response->assertStatus(200);

    $response->assertInertia(function (AssertableInertia $page) {
        $page->component('Catalog/Index');
    });
});
