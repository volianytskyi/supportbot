<?php

namespace App\Controllers;

use App\Config;
use Telegram\Bot\Api as Telegram;
use \Notifier;


class TelegramController
{
  private $telegram;

  public function __construct()
  {
    $this->telegram = new Telegram(Config::get('telegram_api_key'));
  }

  public function actionWebhook()
  {
    $request = $this->telegram->getWebhookUpdates();
  }
}

 ?>
