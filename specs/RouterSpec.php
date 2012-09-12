<?php

include 'classes/tertius/router.php';

class DescribeRouter extends \PHPSpec\Context
{
  public function itMatchesAUri()
  {
    $router = new \Tertius\Router;
    $router->get('', function() {
      return 'the content';
    });

    $this->spec($router->match('get', '/'))->should->be('the content');
  }

  public function itMatchesAUriWithParameters()
  {
    $router = new \Tertius\Router;
    $router->get('<asked>/<got>', function() use($router) {
      $asked = $router->params('asked');
      $got = $router->params('got');
      return "You asked for $asked but I gave you $got!";
    });

    $this->spec($router->match('get', '/1/2'))->should->be('You asked for 1 but I gave you 2!');
  }

  public function itMatchesAPostRequest()
  {
    $router = new \Tertius\Router;
    $router->post('', function() {
      return 'this is a post';
    });

    $this->spec($router->match('post', ''))->should->be('this is a post');
  }

  public function itLowerCasesTheMethod()
  {

  }
}
