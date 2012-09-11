<?php

include_once 'traits/tertius/arr.php';

class DescribeArr extends \PHPSpec\Context
{
  public function itReturnsAnArrayPath()
  {
    $arr = new TestedArr;
    $this->spec($arr->path('foo.bar', ['foo' => ['bar' => 'foobar']]))->should->be('foobar');
  }
}

class TestedArr
{
  use Tertius\Arr;

  public function path($array, $path)
  {
    return $this->_path($array, $path);
  }
}
