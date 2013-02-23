<?php

/**
 * ExcursionCityTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ExcursionCityTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object ExcursionCityTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('ExcursionCity');
  }
  
  public function getWithExcursion()
  {
    $q = $this->createQuery('c')
      ->leftJoin('c.Excursions j')
      ->where('j.is_publish = 1');
    return $q->execute();
  }
  
  public function getCityWithExcursion($id)
  {
    $q = $this->createQuery('c')
      ->leftJoin('c.Excursions j')
      ->where('j.is_publish = 1')
      ->andWhere('c.id = ?', $id);

    return $q->fetchone();
  }
}