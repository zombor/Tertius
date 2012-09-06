<?php

namespace Tertius;

class Request
{
  const TYPE_MONGREL = 1;

  protected $_get;

  public function set_get($get)
  {
    $this->_get = $get;
  }

  public function get()
  {
    return $this->_get;
  }
}
