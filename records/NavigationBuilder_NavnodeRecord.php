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
      'startDate' => array(AttributeType::DateTime, 'required' => true),
      'endDate'   => array(AttributeType::DateTime, 'required' => true),
    );
  }

  //======================================================================
  // Define Relationships
  //======================================================================
  public function defineRelations()
  {
    return array(
      'element'  => array(static::BELONGS_TO, 'ElementRecord', 'id', 'required' => true, 'onDelete' => static::CASCADE),
      'navigation' => array(static::BELONGS_TO, 'NavigationBuilder_NavigationRecord', 'required' => true, 'onDelete' => static::CASCADE),
    );
  }

  //======================================================================
  // Define Indexes
  //======================================================================
  // public function defineIndexes()
  // {
  //   return array(
  //     array('columns' => array('id'), 'unique' => true),
  //     array('columns' => array('name'), 'unique' => true),
  //     array('columns' => array('handle'), 'unique' => true),
  //   );
  // }

  //======================================================================
  // Scopes
  //======================================================================
  // public function scopes()
  // {
  //   return array(
  //     'ordered' => array('order' => 'id'),
  //   );
  // }
}