<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_can_be_rendered()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    public function test_contact_form_submission_stores_message()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message',
        ];

        $response = $this->post('/contact', $data);

        $response->assertSessionHas('success', 'Message sent successfully!');
        $this->assertDatabaseHas('messages', $data);
    }

    public function test_contact_form_validation()
    {
        $response = $this->post('/contact', []);

        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    }

    public function test_honeypot_rejects_spam()
    {
        $data = [
            'name' => 'Spam Bot',
            'email' => 'spam@bot.com',
            'subject' => 'Spam',
            'message' => 'Spam message',
            'website' => 'http://spam.com',
        ];

        $response = $this->post('/contact', $data);

        $response->assertSessionHas('success', 'Message sent successfully!');
        $this->assertDatabaseMissing('messages', ['email' => 'spam@bot.com']);
    }
}
