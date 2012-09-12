<?php

namespace Tertius;

class Request
{
  const TYPE_MONGREL = 1;

  protected $_query = [];
  protected $_post = [];
  protected $_body = '';
  protected $_cookie = [];

  public function set_query($query)
  {
    $this->_query = $query;
  }

  public function query($key = NULL)
  {
    if ($key)
      return $this->_query[$key];

    return $this->_query;
  }

  public function set_post($post)
  {
    $this->_post = $post;
  }

  public function post($key = NULL)
  {
    if ($key)
      return $this->_post[$key];

    return $this->_post;
  }

  public function set_body($body)
  {
    $this->_body = $body;
  }

  public function body()
  {
    return $this->_body;
  }

  public function set_cookie($name, $value)
  {
    $this->_cookie[$name] = $value;
  }

  public function cookie($name)
  {
    return $this->_cookie[$name];
  }
}
