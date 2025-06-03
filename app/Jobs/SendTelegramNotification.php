<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\TelegramService;

class SendTelegramNotification implements ShouldQueue
{
    use Queueable;

    protected $chatId;
    protected $text;

    public function __construct($chatId, $text)
    {
        $this->chatId = $chatId;
        $this->text = $text;
    }

    public function handle()
    {
        $telegramService = new TelegramService();
        $telegramService->sendMessage($this->chatId, $this->text);
    }
}