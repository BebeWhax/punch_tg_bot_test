<?php

namespace App\Console\Commands;

use App\Jobs\SendTelegramNotification;
use Illuminate\Console\Command;

class NotifyTo extends Command
{
    protected $signature = 'notify:to';
    protected $description = 'Send info to telegram user';

    protected $telegramId = '329271083';

    public function handle()
    {   
        dispatch(new SendTelegramNotification($this->telegramId, 'hi'));
        $this->info('Уведомления отправлены!');
    }
}
