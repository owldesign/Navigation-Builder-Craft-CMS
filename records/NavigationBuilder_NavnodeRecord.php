<?php
namespace Craft;

class NavigationBuilder_NavnodeRecord extends BaseRecord
{
  //======================================================================
  // Get Table Name
  //======================================================================
  public function getTableName()
  {
    return 'nb_navnode';
  }

  //======================================================================
  // Define Attributes
  //======================================================================
  protected function defineAttributes()
  {
    return array(
      'name'         => array(AttributeType::Name, 'required' => true),
      'handle'       => array(AttributeType::Handle, 'required' => true),
      'description'  => AttributeType::String,
      'customUrl'    => AttributeType::String,
      'entryUrl'     => AttributeType::String
    );
  }

  // //======================================================================
  // // Define Relationships
  // //======================================================================
  public function defineRelations()
  {
    return array(
      'navigations'   => array(static::BELONGS_TO, 'NavigationBuilder_NavigationRecord', 'onDelete' => static::SET_NULL),
      // 'navigations' => array(static::HAS_MANY, 'NavigationBuilder_NavigationRecord', 'navigationId'),
    );
  }

  //======================================================================
  // Define Indexes
  //======================================================================
  public function defineIndexes()
  {
    return array(
      array('columns' => array('id'), 'unique' => true),
      array('columns' => array('name'), 'unique' => true),
      array('columns' => array('handle'), 'unique' => true),
    );
  }

  //======================================================================
  // Scopes
  //======================================================================
  public function scopes()
  {
    return array(
      'ordered' => array('order' => 'id'),
    );
  }
}