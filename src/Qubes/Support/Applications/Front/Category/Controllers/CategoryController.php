<?php
namespace Qubes\Support\Applications\Front\Category\Controllers;

use Qubes\Support\Applications\Front\Base\Controllers\FrontController;
use Qubes\Support\Applications\Front\Category\Views\CategoryView;
use Qubes\Support\Components\Content\Category\Mappers\Category;

class CategoryController extends FrontController
{

  /**
   * Render a Category
   *
   * @param $id
   * @param $slug
   *
   * @return CategoryView
   */
  public function renderCategory($id, $slug)
  {
    $category = new Category($id);

    if(!$category->exists())
    {
      return $this->renderNotFound();
    }

    /** @var CategoryView $view */
    $view = $this->getMapperView($category, 'CategoryView');
    $view->setCategory($category);

    return $this->setView($view);
  }

  /**
   * @return array|\Cubex\Routing\IRoute[]
   */
  public function getRoutes()
  {
    return [
      '/category/:id@num:slug@all' => 'category',
    ];
  }
}
