<?php
namespace Craft;

class NavigationBuilder_NavnodeElementType extends BaseElementType
{
    /**
     * Returns this element type's name.
     *
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('Navnode');
    }

    /**
     * Returns whether this element type has content.
     *
     * @return bool
     */
    public function hasContent()
    {
        return true;
    }

    /**
     * Returns whether this element type has titles.
     *
     * @return bool
     */
    public function hasTitles()
    {
      return true;
    }

    /**
     * Returns whether this element type can have statuses.
     *
     * @return bool
     */
    public function hasStatuses()
    {
      return true;
    }

    /**
     * Returns whether this element type is localized.
     *
     * @return bool
     */
    public function isLocalized()
    {
        return false;
    }

  /**
   * Returns this element type's sources.
   *
   * @param string|null $context
   * @return array|false
   */
  public function getSources($context = null)
  {
    $sources = array(
      '*' => array(
        'label'    => Craft::t('All Navigations'),
      )
    );
    foreach (craft()->navigationBuilder_navigation->getAllNavigations() as $navigation) {
      $key = 'navigation:'.$navigation->id;
      $sources[$key] = array(
        'label'    => $navigation->name,
        'criteria' => array('navigationId' => $navigation->id)
      );
    }
    return $sources;
  }

    // *
    //  * @inheritDoc IElementType::getAvailableActions()
    //  *
    //  * @param string|null $source
    //  *
    //  * @return array|null
     
    // public function getAvailableActions($source = null)
    // {
    // }

    /**
     * Returns the attributes that can be shown/sorted by in table views.
     *
     * @param string|null $source
     * @return array
     */
    public function defineTableAttributes($source = null)
    {
      return array(
        'title'     => Craft::t('Title'),
        'startDate' => Craft::t('Start Date'),
        'endDate'   => Craft::t('End Date'),
      );
    }

    /**
     * Returns the table view HTML for a given attribute.
     *
     * @param BaseElementModel $element
     * @param string $attribute
     * @return string
     */
    public function getTableAttributeHtml(BaseElementModel $element, $attribute)
    {
      // switch ($attribute) {
      //   case 'startDate':
      //   case 'endDate':
      //   {
      //     $date = $element->$attribute;
      //     if ($date)
      //     {
      //       return $date->localeDate();
      //     }
      //     else
      //     {
      //       return '';
      //     }
      //   }
      //   default:
      //   {
      //     return parent::getTableAttributeHtml($element, $attribute);
      //   }
      // }
    }

    /**
     * Defines any custom element criteria attributes for this element type.
     *
     * @return array
     */
    public function defineCriteriaAttributes()
    {
      return array(
        'navigation'   => AttributeType::Mixed,
        'navigationId' => AttributeType::Mixed,
        'startDate'  => AttributeType::Mixed,
        'endDate'    => AttributeType::Mixed,
        'order'      => array(AttributeType::String, 'default' => 'events.startDate asc'),
      );
    }

  /**
   * Modifies an element query targeting elements of this type.
   *
   * @param DbCommand $query
   * @param ElementCriteriaModel $criteria
   * @return mixed
   */
  public function modifyElementsQuery(DbCommand $query, ElementCriteriaModel $criteria)
  {
    $query
      ->addSelect('navnode.navigationId, navnode.startDate, navnode.endDate')
      ->join('navnode navnode', 'navnode.id = elements.id');
    // if ($criteria->navigationId)
    // {
    //   $query->andWhere(DbHelper::parseParam('navnode.navigationId', $criteria->navigationId, $query->params));
    // }
    // if ($criteria->navigation)
    // {
    //   $query->join('navnode_calendars navnode_calendars', 'navnode_calendars.id = navnode.navigationId');
    //   $query->andWhere(DbHelper::parseParam('navnode_calendars.handle', $criteria->navigation, $query->params));
    // }
    // if ($criteria->startDate)
    // {
    //   $query->andWhere(DbHelper::parseDateParam('events.startDate', $criteria->startDate, $query->params));
    // }
    // if ($criteria->endDate)
    // {
    //   $query->andWhere(DbHelper::parseDateParam('events.endDate', $criteria->endDate, $query->params));
    // }
  }

    /**
     * Populates an element model based on a query result.
     *
     * @param array $row
     * @return array
     */
    public function populateElementModel($row)
    {
      // return NavigationBuilder_NavnodeModel::populateModel($row);
    }

    /**
   * Returns the HTML for an editor HUD for the given element.
   *
   * @param BaseElementModel $element
   * @return string
   */
  public function getEditorHtml(BaseElementModel $element)
  {
    // // Start/End Dates
    // $html = craft()->templates->render('navigationbuilder/navnodes/_edit', array(
    //   'element' => $element,
    // ));
    // // Everything else
    // $html .= parent::getEditorHtml($element);
    // return $html;
  }
}