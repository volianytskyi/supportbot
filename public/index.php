<?php

session_start();
try {

  require_once __DIR__ . '/../config/autoload.php';
  require_once __DIR__ . '/../vendor/autoload.php';

  $route = new App\Route();
  $route->run();

}
catch(MyExceptionInterface $e)
{
  $error = $e->getMessage() . PHP_EOL . $e->getTraceAsString();
  error_log($error);

}
catch(Exception $e)
{
  $error = $e->getMessage() . PHP_EOL . $e->getTraceAsString();
  error_log($error);

}





 ?>
