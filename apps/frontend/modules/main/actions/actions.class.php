<?php

/**
 * main actions.
 *
 * @package    excursia
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->excursion_citys = Doctrine_Core::getTable('ExcursionCity')->getWithExcursion();
  }
}
