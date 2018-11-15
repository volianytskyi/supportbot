<?php

use App\Config;
use Telegram\Bot\Api as Telegram;

class Notifier
{
  private $api;

  public function __construct()
  {
    $this->api = new Telegram(Config::get('telegram_api_key'));
  }

  public function notify($chatId, $message)
  {
    $data = [
      'chat_id' => $chatId,
      'parse_mode' => 'HTML',
      'text' => $message
    ];

    $this->api->sendMessage($data);
  }
}

 ?>
