<?php

require 'classes/tertius/router.php';
require 'classes/tertius/application.php';
require 'classes/tertius/request.php';

$app = new \Tertius\Application(new \Tertius\Request);
$router = new \Tertius\Router;
$router->get('', function() use($app) {
  var_dump($app->request()->get());
  return 'This is teritus!';
});
