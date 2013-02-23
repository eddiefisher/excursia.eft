<?php

/**
 * Excursion form base class.
 *
 * @method Excursion getObject() Returns the current form's model object
 *
 * @package    excursia
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExcursionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'title'                   => new sfWidgetFormInputText(),
      'description'             => new sfWidgetFormTextarea(),
      'content'                 => new sfWidgetFormTextarea(),
      'is_publish'              => new sfWidgetFormInputCheckbox(),
      'city_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ExcursionCity'), 'add_empty' => false)),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
      'excursion_category_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ExcursionCategory')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'                   => new sfValidatorString(array('max_length' => 255)),
      'description'             => new sfValidatorString(array('max_length' => 5000)),
      'content'                 => new sfValidatorString(),
      'is_publish'              => new sfValidatorBoolean(array('required' => false)),
      'city_id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ExcursionCity'))),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
      'excursion_category_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ExcursionCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('excursion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Excursion';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['excursion_category_list']))
    {
      $this->setDefault('excursion_category_list', $this->object->ExcursionCategory->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveExcursionCategoryList($con);

    parent::doSave($con);
  }

  public function saveExcursionCategoryList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['excursion_category_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ExcursionCategory->getPrimaryKeys();
    $values = $this->getValue('excursion_category_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ExcursionCategory', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ExcursionCategory', array_values($link));
    }
  }

}
