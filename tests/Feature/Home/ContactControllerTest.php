<?php

use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;

test('the contact page can be rendered', function () {
    $this->get(route('contact'))
        ->assertStatus(200)
        ->assertSee('Contact');
});

it('sends contact message successfully', function () {
    Mail::fake();

    $data = [
        'name'      => 'John Doe',
        'email'     => 'john@example.com',
        'telephone' => '628123456789',
        'subject'   => 'Testing Contact Form',
        'message'   => 'Hello admin, this is a test message.',
    ];

    $response = $this->post(route('contact.send'), $data);

    Mail::assertSent(ContactMessageMail::class, function ($mail) use ($data) {
        return $mail->hasTo('dev-jayon@dewajayon.my.id')
            && $mail->data['email'] === $data['email']
            && $mail->data['message'] === $data['message'];
    });

    $response->assertRedirect(route('contact'));
    $response->assertSessionHas('success', 'Pesan Anda telah dikirim.');
});

it('fails validation if required fields are missing', function () {
    Mail::fake();

    $response = $this->post(route('contact.send'), []);

    $response->assertSessionHasErrors([
        'name',
        'email',
        'telephone',
        'subject',
        'message',
    ]);

    Mail::assertNothingSent();
});
