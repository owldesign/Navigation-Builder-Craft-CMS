<?php
namespace Craft;

class NavigationBuilder_NavnodeModel extends BaseModel
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
      'customUrl'       => AttributeType::String,
      'entryUrl'        => AttributeType::String
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