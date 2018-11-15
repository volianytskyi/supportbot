<?php

use JiraRestApi\Issue\Issue;

class Ticket implements TicketInterface
{
  private $issue;

  public function __construct(Issue $issue)
  {
    $this->issue = $issue;
  }

  public function getNumber()
  {
    return $this->issue->key;
  }

  public function getSummary()
  {
    return $this->issue->fields->summary;
  }

  public function getCreated()
  {
    $date = $this->issue->fields->created;
    return $date->format("Y-m-d H:i:s");
  }

  public function getUpdated()
  {
    $date = $this->issue->fields->updated;
    return $date->format("Y-m-d H:i:s");
  }

  public function getReporter()
  {
    return $this->issue->fields->reporter->name;
  }

  public function getCategory()
  {
    return (isset($this->issue->fields->customFields['customfield_10800']->value))
            ? $this->issue->fields->customFields['customfield_10800']->value
            : null;
  }

  public function getAssignee()
  {
    $user = $this->issue->fields->assignee;

    return ($user !== null) ? $user->name : 'Unassigned';
  }

  public function getDescription()
  {
    return $this->issue->fields->description;
  }

  public function getWebLink()
  {
    $parts = parse_url($this->issue->self);
    return $parts['scheme'].'://'.$parts['host'].'/browse/'.$this->getNumber();
  }
  public function getStatus()
  {
    return $this->issue->fields->status->description;
  }

}

 ?>
