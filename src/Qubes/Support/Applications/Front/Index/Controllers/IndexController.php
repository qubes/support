<?php
namespace Qubes\Support\Applications\Front\Index\Controllers;

use Qubes\Support\Applications\Front\Base\Controllers\FrontController;
use Qubes\Support\Applications\Front\Index\Views\IndexView;

class IndexController extends FrontController
{

  /**
   * Render the Home page
   *
   * @return IndexView
   */
  public function renderIndex()
  {
    /** @var IndexView $view */
    $view = $this->getView('IndexView');

    return $this->setView($view);
  }

  public function getRoutes()
  {
    return ['/' => 'index'];
  }
}
