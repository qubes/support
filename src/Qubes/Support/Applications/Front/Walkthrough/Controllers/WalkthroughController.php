<?php
namespace Qubes\Support\Applications\Front\Walkthrough\Controllers;

use Qubes\Support\Applications\Front\Walkthrough\Views\WalkthroughView;
use Qubes\Support\Applications\Front\Base\Controllers\FrontController;
use Qubes\Support\Components\Content\Walkthrough\Mappers\Walkthrough;
use Qubes\Support\Components\Content\Walkthrough\Mappers\WalkthroughStep;

class WalkthroughController extends FrontController
{
  /**
   * Render an Walkthrough
   *
   * @param $id
   * @param $stepNumber
   *
   * @return WalkthroughView
   */
  public function renderWalkthrough($id, $stepNumber)
  {
    $walkthrough = new Walkthrough($id);
    if(!$walkthrough->exists())
    {
      return $this->renderNotFound();
    }

    $step = $walkthrough->getStep($stepNumber);
    if(!$step)
    {
      return $this->renderNotFound();
    }

    /** @var WalkthroughView $view */
    $view = $this->getView('WalkthroughView');
    $view->setWalkthrough($walkthrough);
    $view->setCurrentStep($step);

    return $view;
  }

  /**
   * @return array|\Cubex\Routing\IRoute[]
   */
  public function getRoutes()
  {
    return [
      '/walkthrough/(?P<id>\d+)-.*/(?P<stepNumber>\d+)-.*' => 'walkthrough',
    ];
  }
}