<?php

namespace App\Services;

use GuzzleHttp\Client;

class TelegramApiService
{
    public function getTasks()
    {
        $client = new Client();
        $response = $client->get('https://jsonplaceholder.typicode.com/todos');

        $tasks = json_decode($response->getBody(), true);
        return collect($tasks)->where('completed', false)->where('userId', '<=', 5)->values()->all();
    }
}
