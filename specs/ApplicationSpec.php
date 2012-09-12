<?php

include_once 'classes/tertius/application/core.php';
include_once 'classes/tertius/request.php';

class DescribeApplication extends \PHPSpec\Context
{
  public function itParsesAMongrelRequest()
  {
    $request = Mockery::mock('request');
    $request->shouldReceive('set_query')->with(['foo' => 'bar']);
    $request->shouldReceive('set_post')->with(['foo' => 'baz']);

    $mongrel_request = (object) ['body' => 'foo=baz', 'headers' => (object) ['URI' => '/?foo=bar']];

    $app = new TestApplication($request, NULL);
    $app->set_request($mongrel_request, \Tertius\Request::TYPE_MONGREL);
  }

  public function itAcceptsAConfig()
  {
    $config = Mockery::mock('config');
    $app = new TestApplication(NULL, $config);
    $this->spec($app->config())->should->be($config);
  }

  public function itReceivesARouter()
  {
    $router = Mockery::mock('router');
    $app = new TestApplication(NULL, NULL);
    $app->set_router($router);
    $this->spec($app->router())->should->be($router);
  }
}

class TestApplication extends \Tertius\Application\Core
{
}
