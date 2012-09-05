<?php

namespace Tertius;

class Router
{

  const REGEX_ESCAPE  = '[.\\+*?[^\\]${}=!|]';
  const REGEX_SEGMENT = '[a-zA-Z0-9_]++';
//  const REGEX_SEGMENT = '[^/.,;?\n]++';

  protected $_routes = [
    'get' => [],
  ];

  public function get($uri, $action)
  {
    $this->_routes['get'][$uri] = $action;
  }

  public function match($method, $uri, $regex = [])
  {
    $uri = ltrim($uri, '/');
    $method = strtolower($method);

    foreach ($this->_routes[$method] as $stored_uri => $action)
    {
      $expression = preg_replace('#'.Router::REGEX_ESCAPE.'#', '\\\\$0', $stored_uri);
      $expression = str_replace(array('<', '>'), array('(?P<', '>'.Router::REGEX_SEGMENT.')'), $expression);

      $expression = '#^'.$expression.'$#uD';

      if ($stored_uri == $uri)
        return $action();

      if (preg_match($expression, $uri, $matches))
      {
        foreach ($matches as $k => $v)
        {
          if ( ! is_int($k))
          {
            $this->_params[$k] = $v;
          }
        }
        return $action($matches);
      }
    }
  }

  public function params($param = NULL)
  {
    return $this->_params[$param];
  }
}
