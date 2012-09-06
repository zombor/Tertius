<?php

namespace Tertius;

class Application
{
  const MONGREL_REQUEST = 1;

  protected $_params;

  public function set_request($req, $type)
  {
    switch ($type)
    {
      case self::MONGREL_REQUEST:
        $headers = $req->headers;
        parse_str(parse_url($headers->URI, PHP_URL_QUERY), $this->_params);
      break;
    }
  }

  public function params()
  {
    return $this->_params;
  }
}
