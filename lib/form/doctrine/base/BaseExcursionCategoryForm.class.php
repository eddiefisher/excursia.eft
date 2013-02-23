<?php

/**
 * ExcursionCategory form base class.
 *
 * @method ExcursionCategory getObject() Returns the current form's model object
 *
 * @package    excursia
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExcursionCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'title'           => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'excursions_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Excursion')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'           => new sfValidatorString(array('max_length' => 255)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
      'excursions_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Excursion', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('excursion_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExcursionCategory';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['excursions_list']))
    {
      $this->setDefault('excursions_list', $this->object->Excursions->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveExcursionsList($con);

    parent::doSave($con);
  }

  public function saveExcursionsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['excursions_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Excursions->getPrimaryKeys();
    $values = $this->getValue('excursions_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Excursions', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Excursions', array_values($link));
    }
  }

}
