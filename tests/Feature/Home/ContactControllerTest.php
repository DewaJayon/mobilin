<?php

test('the contact page can be rendered', function () {
    $this->get(route('contact'))
        ->assertStatus(200)
        ->assertSee('Contact');
});
