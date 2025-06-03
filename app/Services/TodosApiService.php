<?php

namespace App\Services;

use GuzzleHttp\Client;

class TodosApiService
{
    public function getTasks()
    {
        $client = new Client();
        $response = $client->get('https://jsonplaceholder.typicode.com/todos', [
            'verify' => false
        ]);

        $tasks = json_decode($response->getBody(), true);
        return collect($tasks)->where('completed', false)->where('userId', '<=', 5)->values()->all();
    }
}
