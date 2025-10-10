<?php

test('the contact page can be rendered', function () {
    $this->get(route('contact'))
        ->assertStatus(200)
        ->assertSee('Contact');
});

test('contact form can be submitted', function () {

    $response = $this->post(route('contact.send'), [
        'name'      => 'Test User',
        'email'     => 'test@example.com',
        'telephone' => '1234567890',
        'message'   => 'Test Message',
        'subject'   => 'Test Subject',
    ]);

    $response->assertRedirect(route('contact'))
        ->assertSessionHas('success', 'Pesan Anda telah dikirim.');
});
