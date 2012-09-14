<?php

namespace Tertius;

class ViewRenderer
{
  protected $_app = NULL;

  protected $_template = '';

  public function __construct($app = NULL)
  {
    $this->_app = $app;
  }

  public function set_template($template)
  {
    $this->_template = $template;
  }

  public function render($view)
  {
    $mustache = new \Mustache_Engine;

    if ( ! $this->_template)
    {
      $this->_template = $this->load_file();
    }

    return $mustache->render($this->_template, $view);
  }

  public function load_file()
  {
    $class_name = strtolower(get_class($this));
    $parts = explode('\\', $class_name);
    $file = $this->_app->root().'templates/'.implode('/', $parts).'.mustache';

    return file_get_contents($file);
  }
}
