<?php

require_once 'classes/tertius/application/mongrel.php';

class DescribeMongrel extends \PHPSpec\Context
{
  public function itServesAMongrelRequest()
  {
    $router = Mockery::mock('router');
    $router->shouldReceive('match')->andReturn('the body');
    $app = new \Tertius\Application\Mongrel(NULL, NULL);
    $app->set_router($router);

    $req = (object) (['headers' => ((object) ['METHOD' => 'GET']), 'path' => '/']);
    $conn = Mockery::mock('conn');
    $conn->shouldReceive('reply_http')->with($req, 'the body');


    $app->run($conn, $req);
  }
}
