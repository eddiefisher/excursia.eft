<?php

/**
 * Excursion filter form base class.
 *
 * @package    excursia
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExcursionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_publish'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'city_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ExcursionCity'), 'add_empty' => true)),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'excursion_category_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ExcursionCategory')),
    ));

    $this->setValidators(array(
      'title'                   => new sfValidatorPass(array('required' => false)),
      'description'             => new sfValidatorPass(array('required' => false)),
      'content'                 => new sfValidatorPass(array('required' => false)),
      'is_publish'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'city_id'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ExcursionCity'), 'column' => 'id')),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'excursion_category_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ExcursionCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('excursion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addExcursionCategoryListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ExcursionCategoryRelations ExcursionCategoryRelations')
      ->andWhereIn('ExcursionCategoryRelations.category_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Excursion';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'title'                   => 'Text',
      'description'             => 'Text',
      'content'                 => 'Text',
      'is_publish'              => 'Boolean',
      'city_id'                 => 'ForeignKey',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
      'excursion_category_list' => 'ManyKey',
    );
  }
}
