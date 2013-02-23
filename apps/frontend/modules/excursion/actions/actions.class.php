<?php

/**
 * excursion actions.
 *
 * @package    excursia
 * @subpackage excursion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class excursionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->excursions = Doctrine_Core::getTable('Excursion')->getActiveExcursion();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->excursion = Doctrine_Core::getTable('Excursion')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->excursion);
  }

}
