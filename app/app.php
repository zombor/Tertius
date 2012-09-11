<?php

require 'classes/tertius/router.php';
require 'classes/tertius/application/mongrel.php';
require 'classes/tertius/request.php';
require 'classes/tertius/config.php';

$config = new \Tertius\Config;
$config->attach('system', require 'config/system.php');
$app = new \Tertius\Application\Mongrel(
  new \Tertius\Request,
  $config
);
$router = new \Tertius\Router;
$router->get('', function() use($app) {
  var_dump($app->request()->get());
  $return = "base_url: ".$app->config()->get('system', 'base_url')."\n".
    "This is tertius!\n";
  return $return;
});

$app->set_router($router);
