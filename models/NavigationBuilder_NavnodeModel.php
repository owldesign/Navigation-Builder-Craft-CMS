<?php
namespace Craft;

class NavigationBuilder_NavnodeModel extends BaseElementModel
{
 
  protected $elementType = 'NavigationBuilder_Navnode';

  /**
   * @access protected
   * @return array
   */
  protected function defineAttributes()
  {
    return array_merge(parent::defineAttributes(), array(
      'navigationId' => AttributeType::Number,
      'startDate'  => AttributeType::DateTime,
      'endDate'    => AttributeType::DateTime,
    ));
  }

  /**
   * Returns whether the current user can edit the element.
   *
   * @return bool
   */
  public function isEditable()
  {
    return true;
  }

  /**
   * Returns the element's CP edit URL.
   *
   * @return string|false
   */
  public function getCpEditUrl()
  {
    $navigation = $this->getNativation();
    if ($navigation)
    {
      return UrlHelper::getCpUrl('navigation/'.$navigation->handle.'/'.$this->id);
    }
  }

  /**
   * Returns the field layout used by this element.
   *
   * @return FieldLayoutModel|null
   */
  public function getFieldLayout()
  {
    $navigation = $this->getNavigation();
    if ($navigation)
    {
      return $navigation->getFieldLayout();
    }
  }

  /**
   * Returns the event's calendar.
   *
   * @return Events_CalendarModel|null
   */
  public function getNavigation()
  {
    if ($this->navigationId)
    {
      return craft()->navigationBuilder_navigation->getNavigationById($this->navigationId);
    }
  }


}