<?php

/**
 * ExcursionCategoryRelations form base class.
 *
 * @method ExcursionCategoryRelations getObject() Returns the current form's model object
 *
 * @package    excursia
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExcursionCategoryRelationsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'excursion_id' => new sfWidgetFormInputHidden(),
      'category_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'excursion_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('excursion_id')), 'empty_value' => $this->getObject()->get('excursion_id'), 'required' => false)),
      'category_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('category_id')), 'empty_value' => $this->getObject()->get('category_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('excursion_category_relations[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExcursionCategoryRelations';
  }

}
