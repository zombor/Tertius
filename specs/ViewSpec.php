<?php

include_once 'classes/tertius/view.php';

class DescribeView extends \PHPSpec\Context
{
  public function itAssignsATemplateByString()
  {
    $view = new \Tertius\View;
    $view->set_template('The template says {{word}}');
    $view->word = 'moo';

    $this->spec($view->render())->should->be('The template says moo');
  }

  public function itReadsATemplateFromTheFilesystem()
  {
    $this->pending('how do i test it?');
    $app = Mockery::mock('app');
    $app->shouldReceive('root')->andReturn('/foo/bar/');
    $view = new \Tertius\View($app);
    $view->word = 'moo';

    $this->spec($view->render())->should->be('The template says moo');
  }
}
