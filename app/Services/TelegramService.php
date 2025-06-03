<?php

namespace App\Services;

use GuzzleHttp\Client;

class TelegramService
{
    protected $client;
    protected $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->token = config('services.telegram.bot_token');
    }

    public function sendMessage($chatId, $text)
    {
        $url = "https://api.telegram.org/bot{$this->token}/sendMessage";
        $this->client->post($url, [
            'json' => [
                'chat_id' => $chatId,
                'text' => $text,
            ],
        ]);
    }
}