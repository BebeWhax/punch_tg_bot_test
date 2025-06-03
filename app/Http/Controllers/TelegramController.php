<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function webhook(Request $request)
    {
        $data = $request->all();

        $message = $data['message'] ?? null;
        if (!$message) {
            return response()->noContent();
        }

        $chatId = $message['chat']['id'];
        $text = trim($message['text'] ?? '');

        if ($text === '/start') {
            User::updateOrCreate(
                ['telegram_id' => $chatId],
                ['name' => $message['chat']['first_name'] ?? '', 'subscribed' => true]
            );
            $this->sendMessage($chatId, 'Вы успешно подписаны на уведомления!');
        } elseif ($text === '/stop') {
            User::where('telegram_id', $chatId)->update(['subscribed' => false]);
            $this->sendMessage($chatId, 'Вы успешно отписаны от уведомлений!');
        }

        return response()->noContent();
    }

    private function sendMessage($chatId, $text)
    {
        $token = config('services.telegram.bot_token');
        $url = "https://api.telegram.org/bot" . $token . "/sendMessage";

        $client = new \GuzzleHttp\Client();
        $client->post($url, [
            'json' => [
                'chat_id' => $chatId,
                'text' => $text,
            ],
        ]);
    }
}