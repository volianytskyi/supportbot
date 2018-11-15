<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/autoload.php';

use App\Config;

$project = new JiraProject('SLA Support');

foreach ($project->getAllWaitingForSupport() as $ticket)
{
  if($ticket->getCategory() != FailureCategory::F1 && $ticket->getCategory() != FailureCategory::F2)
  {
    continue;
  }

  $info = new TicketInfo($ticket);
  $chat = new Notifier();
  $chat->notify(Config::get('telegram_group_chat_id'), $info->getShort());

}

 ?>
