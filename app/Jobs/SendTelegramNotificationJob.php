<?php
namespace App\Jobs;

use App\Services\TelegramService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTelegramNotification implements ShouldQueue
{
    use Queueable;

    protected $chatId;
    protected $text;
    protected TelegramService $telegramService;

    public function __construct($telegramService, $chatId, $text)
    {
        $this->chatId = $chatId;
        $this->text = $text;
        $this->telegramService = $telegramService;
    }

    public function handle()
    {
        $this->telegramService->sendMessage($this->chatId, $this->text);
    }
}