<?php

namespace Tertius\Application;

require_once 'core.php';

class Mongrel extends Core
{
  public function run($conn, $req)
  {
    $conn->reply_http($req, $this->_router->match($req->headers->METHOD, $req->path));
  }
}
