<?php

include_once 'classes/tertius/config.php';

class DescribeConfig extends \PHPSpec\Context
{
  public function itAttachesAnArray()
  {
    $config = new \Tertius\Config;
    $config->attach('system', [
      'base_url' => 'http://example.com'
    ]);

    $this->spec($config->get('system', 'base_url'))->should->be('http://example.com');
  }

  public function itAcceptsOtherConfigReaders()
  {
    $this->pending('just an example');

    $config = new \Tertius\Config;
    $config->attach('system', new DatabaseReader);
  }
}
