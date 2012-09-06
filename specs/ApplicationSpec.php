<?php

include_once 'classes/tertius/application/core.php';
include_once 'classes/tertius/request.php';

class DescribeApplication extends \PHPSpec\Context
{
  public function itParsesAMongrelRequest()
  {
    $request = Mockery::mock('request');
    $request->shouldReceive('set_get')->with(['foo' => 'bar']);

    $mongrel_request = (object) ['headers' => (object) ['URI' => '/?foo=bar']];

    $app = new TestApplication($request);
    $app->set_request($mongrel_request, \Tertius\Request::TYPE_MONGREL);
  }

  public function itReceivesARouter()
  {
    $router = Mockery::mock('router');
    $app = new TestApplication(NULL);
    $app->set_router($router);
    $this->spec($app->router())->should->be($router);
  }
}

class TestApplication extends \Tertius\Application\Core
{
}
