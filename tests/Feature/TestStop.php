<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestStop extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_stop_command_unsubscribes_user()
    {
        \App\Models\User::create([
            'telegram_id' => 12345,
            'name' => 'TestUser',
            'subscribed' => true
        ]);
        $response = $this->postJson('/telegram/webhook', [
            'message' => [
                'chat' => ['id' => 12345, 'first_name' => 'TestUser'],
                'text' => '/stop'
            ]
        ]);
        $response->assertNoContent();
        $this->assertDatabaseHas('users', [
            'telegram_id' => 12345,
            'subscribed' => false
        ]);
    }

}
