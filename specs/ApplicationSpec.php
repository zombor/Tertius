<?php

include_once 'classes/tertius/application.php';
include_once 'classes/tertius/request.php';

class DescribeApplication extends \PHPSpec\Context
{
  public function itParsesAMongrelRequest()
  {
    $request = Mockery::mock('request');
    $request->shouldReceive('set_get')->with(['foo' => 'bar']);

    $mongrel_request = (object) ['headers' => (object) ['URI' => '/?foo=bar']];

    $app = new \Tertius\Application($request);
    $app->set_request($mongrel_request, \Tertius\Request::TYPE_MONGREL);
  }
}
