<?php

namespace Tertius;

include_once 'traits/tertius/arr.php';

class Config
{
  use \Tertius\Arr;

  protected $_reg = [];

  public function attach($group, $values)
  {
    $this->_reg[$group] = $values;
  }

  public function get($group, $path)
  {
    if (is_array($this->_reg[$group]))
      return $this->_path($path, $this->_reg[$group]);
  }

}
