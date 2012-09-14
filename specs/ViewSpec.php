<?php

include_once 'classes/tertius/viewrenderer.php';

class DescribeView extends \PHPSpec\Context
{
  public function itAssignsATemplateByString()
  {
    $view = new \Tertius\ViewRenderer;
    $view->set_template('The template says {{word}}');

    $this->spec($view->render(['word' => 'moo']))->should->be('The template says moo');
  }

  public function itReadsATemplateFromTheFilesystem()
  {
    $this->pending('how do i test it?');
    $app = Mockery::mock('app');
    $app->shouldReceive('root')->andReturn('/foo/bar/');
    $view = new \Tertius\ViewRenderer($app);

    $this->spec($view->render(['word' => 'moo']))->should->be('The template says moo');
  }
}
