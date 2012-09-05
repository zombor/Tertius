<?php

require 'classes/kohana/router.php';

$router = new \Kohana\Router;
$router->get('', function() {
  return 'This is kohana!';
});
