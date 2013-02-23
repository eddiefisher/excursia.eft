<?php

/**
 * ExcursionCategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ExcursionCategoryTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object ExcursionCategoryTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('ExcursionCategory');
  }
  
  public function getWithExcursion()
  {
    $q = $this->createQuery('c')
      ->leftJoin('c.Excursions j')
      ->where('j.is_publish = 1');

    return $q->execute();
  }
  
  public function getCategoryWithExcursion($id)
  {
    $q = $this->createQuery('c')
      ->leftJoin('c.Excursions j')
      ->where('j.is_publish = 1')
      ->andWhere('c.id = ?', $id);

    return $q->fetchone();
  }
}