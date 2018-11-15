<?php

interface TicketInterface
{
  public function getNumber();
  public function getSummary();
  public function getCreated();
  public function getUpdated();
  public function getReporter();
  public function getCategory();
  public function getAssignee();
  public function getDescription();
  public function getWebLink();
  public function getStatus();

}

 ?>
