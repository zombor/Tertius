<?php

namespace Tertius;

class View
{
  protected $_app = NULL;

  protected $_template = '';

  protected $_data = [];

  public function __construct($app = NULL)
  {
    $this->_app = $app;
  }

  public function __set($key, $val)
  {
    $this->_data[$key] = $val;
  }

  public function set_template($template)
  {
    $this->_template = $template;
  }

  public function render()
  {
    $mustache = new \Mustache_Engine;

    if ( ! $this->_template)
    {
      $this->_template = $this->load_file();
    }

    return $mustache->render($this->_template, $this->_data);
  }

  public function load_file()
  {
    $class_name = strtolower(get_class($this));
    $parts = explode('\\', $class_name);
    $file = $this->_app->root().'templates/'.implode('/', $parts).'.mustache';

    return readfile($file);
  }
}
