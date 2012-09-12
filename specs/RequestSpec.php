<?php

include_once 'classes/tertius/request.php';

class DescribeRequest extends \PHPSpec\Context
{

  public function itAssignsQuery()
  {
    $request = new \Tertius\Request;
    $request->set_query(['foo' => 'bar']);

    $this->spec($request->query())->should->be(['foo' => 'bar']);
  }

  public function itQueryDefaultsToEmptyArray()
  {
    $request = new \Tertius\Request;
    $this->spec($request->query())->should->be([]);
  }

  public function itFetchesQueryByKey()
  {
    $request = new \Tertius\Request;
    $request->set_query(['foo' => 'bar']);

    $this->spec($request->query('foo'))->should->be('bar');
  }

  public function itAssignsBody()
  {
    $request = new \Tertius\Request;
    $request->set_body('{"foo": "bar"}');

    $this->spec($request->body())->should->be('{"foo": "bar"}');
  }

  public function itBodyDefaultsToEmptyString()
  {
    $request = new \Tertius\Request;
    $this->spec($request->body())->should->be('');
  }

  public function itAssignsPost()
  {
    $request = new \Tertius\Request;
    $request->set_post(['foo' => 'bar']);

    $this->spec($request->post())->should->be(['foo' => 'bar']);
  }

  public function itPostDefaultsToEmptyArray()
  {
    $request = new \Tertius\Request;
    $this->spec($request->post())->should->be([]);
  }

  public function itFetchesPostByKey()
  {
    $request = new \Tertius\Request;
    $request->set_post(['foo' => 'bar']);

    $this->spec($request->post('foo'))->should->be('bar');
  }

  public function itAssignsCookie()
  {
    $request = new \Tertius\Request;
    $request->set_cookie('foobar', ['foo' => 'bar']);

    $this->spec($request->cookie('foobar'))->should->be(['foo' => 'bar']);
  }
}
