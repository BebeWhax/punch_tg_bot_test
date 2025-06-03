<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User1',
            'telegram_id' => 123456,
            'subscribed' => TRUE,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test User2',
            'telegram_id' => 223456,
            'subscribed' => TRUE,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test User3',
            'telegram_id' => 323456,
            'subscribed' => TRUE,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test User4',
            'telegram_id' => 423456,
            'subscribed' => FALSE,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test User5',
            'telegram_id' => 523456,
            'subscribed' => FALSE,
        ]);
    }
}
