<?php

/**
 * city actions.
 *
 * @package    excursia
 * @subpackage city
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cityActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->excursion_citys = Doctrine_Core::getTable('ExcursionCity')->getWithExcursion();
  }

  public function executeShowCityAndExcursion(sfWebRequest $request)
  {
    $this->excursion_city = Doctrine_Core::getTable('ExcursionCity')->getCityWithExcursion($request->getParameter('id'));
    $this->forward404Unless($this->excursion_city);
  }
}
