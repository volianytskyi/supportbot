<?php

class TicketInfo
{
  private $ticket;

  public function __construct(TicketInterface $ticket)
  {
    $this->ticket = $ticket;
  }

  public function getShort()
  {
    return    $this->ticket->getNumber() .PHP_EOL .
              "Summary: ". $this->ticket->getSummary() . PHP_EOL .
              "Created: " . $this->ticket->getCreated() .PHP_EOL .
              "Reporter: " . $this->ticket->getReporter() .PHP_EOL .
              "Category: " . $this->ticket->getCategory() .PHP_EOL .
              "Assignee: " . $this->ticket->getAssignee() . PHP_EOL .
              "Updated: " . $this->ticket->getUpdated() . PHP_EOL .
              $this->ticket->getWebLink();
  }
}

 ?>
