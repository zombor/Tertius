<?php

require 'classes/tertius/router.php';

$router = new \Tertius\Router;
$router->get('', function() {
  return 'This is teritus!';
});
