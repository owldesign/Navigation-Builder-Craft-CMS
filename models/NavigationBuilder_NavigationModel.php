<?php
namespace Craft;

class NavigationBuilder_NavigationModel extends BaseModel
{
  /**
   * Name to string
   *
   */
  function __toString()
  {
    return Craft::t($this->name);
  }

  /**
   * Define Attributes
   *
   */
  protected function defineAttributes()
  {
    return array(
      'id'              => AttributeType::Number,
      'name'            => array(AttributeType::Name, 'required' => true),
      'handle'          => array(AttributeType::Handle, 'required' => true),
      'description'     => AttributeType::String,
      'navNode'         => AttributeType::Mixed
    );
  }

  // /**
  //  * Behaviors
  //  *
  //  */
  // public function behaviors()
  // {
  //   return array();
  // }

}