<?php
namespace Qubes\Support\Applications\Front\Base\Views;

use Cubex\Facade\Auth;
use Cubex\View\Partial;
use Cubex\View\RenderGroup;
use Cubex\View\ViewModel;
use Qubes\Bootstrap\BootstrapItem;
use Qubes\Bootstrap\FormSearch;

class FrontHeader extends ViewModel
{
  public function __construct()
  {
  }

  public function render()
  {
    $menus = [
      'Home'           => '/',
      'Video'          => '/video/1-example-video',
      'Category'       => '/category/1-example-category',
      'Article'        => '/article/1-example-article',
      'Walkthrough'    => '/walkthrough/1-example-walkthrough/1-step',
      'Search Results' => '/search/example',
      'Contact' => '/contact',
    ];

    $navItems = new Partial(
      '<li class="%s">
        <a href="%s" title="%s">%s</a></li>',
      null,
      false
    );

    foreach($menus as $text => $url)
    {
      $state = '';
      $navItems->addElement(
        $state,
        $url,
        $text,
        $text
      );
    }

    $searchForm = new FormSearch();
    $searchForm->setAttribute('method', 'post');
    $searchForm->setAttribute('action', '/search');
    $searchForm->setFormType(FormSearch::FORM_TYPE_NAVBAR);
    $searchForm->setAlignment(FormSearch::ALIGN_RIGHT);
    $searchForm->setText('Search');
    $searchForm->setName('term');

    return new RenderGroup(
      '<a id="support-logo" class="brand" href="/">',
      'Support Center</a>',
      '<ul class="nav">',
      $navItems,
      '</ul>',
      $searchForm->render()
    );
  }
}
