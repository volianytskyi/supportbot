<?php

use JiraRestApi\Issue\IssueService;

class JiraProject
{
  private $name;
  private $issueService;

  const WAITING_FOR_SUPPORT = 'Waiting for support';

  public function __construct($name)
  {
    $this->name = filter_var($name, FILTER_SANITIZE_STRING);
    $this->issueService = new IssueService();
  }

  public function getAllWaitingForSupport()
  {
    $jql = 'project = "'.$this->name.'" AND status = "'.self::WAITING_FOR_SUPPORT.'"';
    foreach ($this->issueService->search($jql)->getIssues() as $jiraIssue)
    {
      yield new Ticket($jiraIssue);
    }
  }
}

 ?>
