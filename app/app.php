<?php

require 'classes/tertius/router.php';
require 'classes/tertius/application.php';

$app = new \Tertius\Application;
$router = new \Tertius\Router;
$router->get('', function() use($app) {
  var_dump($app->params());
  return 'This is teritus!';
});
