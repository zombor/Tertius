<?php

namespace Tertius\Application;

abstract class Core
{
  protected $_params;
  protected $_request;
  protected $_router;
  protected $_config;

  public function __construct($request, $config)
  {
    $this->_request = $request;
    $this->_config = $config;
  }

  public function set_request($req, $type)
  {
    switch ($type)
    {
      case \Tertius\Request::TYPE_MONGREL:
        $headers = $req->headers;
        parse_str(parse_url($headers->URI, PHP_URL_QUERY), $get);
        $this->_request->set_get($get);
      break;
    }
  }

  public function request()
  {
    return $this->_request;
  }

  public function config()
  {
    return $this->_config;
  }

  public function router()
  {
    return $this->_router;
  }

  public function set_router($router)
  {
    $this->_router = $router;
  }
}
