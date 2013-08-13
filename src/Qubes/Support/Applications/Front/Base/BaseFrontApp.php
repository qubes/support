<?php
namespace Qubes\Support\Applications\Front\Base;

use Cubex\Core\Application\Application;
use Cubex\Foundation\Container;
use Cubex\Theme\ApplicationTheme;
use Qubes\Support\Applications\Front\Base\Controllers\FrontController;
use Themed\Sidekick\SidekickTheme;

abstract class BaseFrontApp extends Application
{

  public function init()
  {
    $this
    ->_setGlobalCss()
    ->_setGlobalJs();
  }

  private function _setGlobalCss()
  {
    Container::config()->get('project')->css = (array)$this->getGlobalCss();

    return $this;
  }

  private function _setGlobalJs()
  {
    Container::config()->get('project')->js = (array)$this->getGlobalJs();

    return $this;
  }

  public function getGlobalCss()
  {
    return [];
  }

  public function getGlobalJs()
  {
    return [];
  }

  /**
   * Set the default project theme
   *
   * @return \Cubex\Theme\ApplicationTheme|SidekickTheme
   */
  public function getTheme()
  {
    if(Container::config()->get('project')->extended)
    {
      return new ApplicationTheme($this);
    }

    return new SidekickTheme;
  }
}
