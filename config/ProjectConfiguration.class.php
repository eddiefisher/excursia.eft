<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfDoctrineNestedSetPlugin');
  }

  public function configureDoctrine(Doctrine_Manager $manager)
  {
    $manager->setCharset('utf8');
    $manager->setCollate('utf8_unicode_ci');
  }
}
