<?php

namespace App\Console\Commands;

use App\Jobs\SendTelegramNotification;
use App\Models\User;
use App\Services\TodosApiService;
use Illuminate\Console\Command;

class NotifyTasks extends Command
{
    protected $signature = 'notify:tasks';
    protected $description = 'Send tasks notifications to Telegram users';

    public function handle()
    {
        $apiService = new TodosApiService();
        $tasks = $apiService->getTasks();
        $text = "Новые задачи:\n";
        foreach ($tasks as $task) {
            $text .= "- {$task['title']}\n";
        }
    
        $users = User::where('subscribed', true)->get();
        foreach ($users as $user) {
            dispatch(new SendTelegramNotification($user->telegram_id, $text));
        }

        $this->info('Уведомления отправлены!');
    }
}
