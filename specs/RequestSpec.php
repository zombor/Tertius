<?php

include_once 'classes/tertius/request.php';

class DescribeRequest extends \PHPSpec\Context
{
  public function itAssignsGet()
  {
    $request = new \Tertius\Request;
    $request->set_get(['foo' => 'bar']);

    $this->spec($request->get())->should->be(['foo' => 'bar']);
  }
}
