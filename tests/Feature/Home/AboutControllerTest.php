<?php

test('the about page can be rendered', function () {
    $this->get(route('about'))
        ->assertStatus(200)
        ->assertSee('About');
});
