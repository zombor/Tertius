<?php

include 'classes/tertius/application.php';

class DescribeApplication extends \PHPSpec\Context
{
  public function itAssignsAMongrelRequest()
  {
    $req = Mockery::mock('mongrel request');
    $req->headers = ((object) ['URI' => '/?foo=bar']);
    $app = new \Tertius\Application;
    $app->set_request($req, \Tertius\Application::MONGREL_REQUEST);

    $this->spec($app->params())->should->be(['foo' => 'bar']);
  }
}
