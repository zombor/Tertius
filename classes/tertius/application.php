<?php

namespace Tertius;

class Application
{
  protected $_params;
  protected $_request;

  public function __construct($request)
  {
    $this->_request = $request;
  }

  public function set_request($req, $type)
  {
    switch ($type)
    {
      case Request::TYPE_MONGREL:
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
}
