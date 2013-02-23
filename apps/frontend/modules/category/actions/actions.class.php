<?php

/**
 * category actions.
 *
 * @package    excursia
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->excursion_categorys = Doctrine_Core::getTable('ExcursionCategory')->getWithExcursion();
  }

  public function executeShowCategoryAndExcursion(sfWebRequest $request)
  {
    $this->excursion_category = Doctrine_Core::getTable('ExcursionCategory')->getCategoryWithExcursion($request->getParameter('id'));
    $this->forward404Unless($this->excursion_category);
  }
}
