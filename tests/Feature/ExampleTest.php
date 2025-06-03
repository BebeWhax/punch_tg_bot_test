<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_start_command_registers_user()
    {
        $response = $this->postJson('/telegram/webhook', [
            'message' => [
                'chat' => ['id' => 12345, 'first_name' => 'TestUser'],
                'text' => '/start'
            ]
        ]);

        $response->assertNoContent();
        $this->assertDatabaseHas('users', ['telegram_id' => 12345, 'subscribed' => true]);
    }
}
