<?php
namespace Craft;

class NavigationBuilder_NavigationService extends BaseApplicationComponent
{
	
	private $_navigationsById;
	private $_fetchedAllNavigations = false;

	/**
	 * Get All Navigations
	 *
	 */
	public function getAllNavigations($indexBy = null)
	{
	  if (!$this->_fetchedAllNavigations) {
	    $navigationRecord = NavigationBuilder_NavigationRecord::model()->ordered()->findAll();
	    $this->_navigationsById = NavigationBuilder_NavigationModel::populateModels($navigationRecord, 'id');
	    $this->_fetchedAllNavigations = true;
	  }

	  if ($indexBy == 'id') {
	    return $this->_navigationsById;
	  } else if (!$indexBy) {
	    return array_values($this->_navigationsById);
	  } else {
	    $navigations = array();
	    foreach ($this->_navigationsById as $navigation) {
	      $navigations[$navigation->$indexBy] = $navigation;
	    }
	    return $navigations;
	  }
	}


	/**
	 * Get Navigation By Handle
	 *
	 */
	public function getNavigationByHandle($navigationHandle)
	{
	  $navigationRecord = NavigationBuilder_NavigationRecord::model()->findByAttributes(array(
	    'handle' => $navigationHandle
	  ));

	  if ($navigationRecord) {
	    return NavigationBuilder_NavigationModel::populateModel($navigationRecord);
	  }
	}

	/**
	 * Get Navigation by ID
	 *
	 */
	public function getNavigationById($navigationId)
	{
	  if (!isset($this->_navigationsById) || !array_key_exists($navigationId, $this->_navigationsById)) {
	    $navigationRecord = NavigationBuilder_NavigationRecord::model()->findById($navigationId);

	    if ($navigationRecord) {
	      $this->_navigationsById[$navigationId] = NavigationBuilder_NavigationModel::populateModel($navigationRecord);
	    } else {
	      $this->_navigationsById[$navigationId] = null;
	    }
	  }
	  return $this->_navigationsById[$navigationId];
	}


	/**
	 * Save New Navigation
	 *
	 */
	public function saveNavigationService(NavigationBuilder_NavigationModel $navigation)
	{
	  if ($navigation->id) {
	    $navigationRecord = NavigationBuilder_NavigationRecord::model()->findById($navigation->id);

	    if (!$navigationRecord) {
	      throw new Exception(Craft::t('No navigation exists with the ID “{id}”', array('id' => $navigation->id)));
	    }
	    $isNewNavigation = false;
	  } else {
	    $navigationRecord = new NavigationBuilder_NavigationRecord();
	    $isNewNavigation = true;
	  }

	  $navigationRecord->name               = $navigation->name;
	  $navigationRecord->handle             = $navigation->handle;
	  $navigationRecord->description        = $navigation->description;
	  // $navigationRecord->navNode         = JsonHelper::encode($navigation->navNode);
	  
	  $navigationRecord->validate();
	  $navigation->addErrors($navigationRecord->getErrors());

	  if (!$navigation->hasErrors()) {
	    $transaction = craft()->db->getCurrentTransaction() === null ? craft()->db->beginTransaction() : null;
	    try {

	      $navigationRecord->save();

	      if (!$navigation->id) { $navigation->id = $navigationRecord->id; }

	      $this->_navigationsById[$navigation->id] = $navigation;

	      if ($transaction !== null) { $transaction->commit(); }
	    } catch (\Exception $e) {
	      if ($transaction !== null) { $transaction->rollback(); }
	      throw $e;
	    }
	    return true;
	  } else { 
	    return false; 
	  }
	}


	/**
	 * Delete Navigation
	 *
	 */
	public function deleteNavigationById($navigationId)
	{ 
	  if (!$navigationId) { return false; }

	  $transaction = craft()->db->getCurrentTransaction() === null ? craft()->db->beginTransaction() : null;
	  try {

	    // Delete all navNodes
	    // $entryIds = craft()->db->createCommand()
	    //   ->select('id')
	    //   ->from('formbuilder2_entries')
	    //   ->where(array('navigationId' => $navigationId))
	    //   ->queryColumn();
	    // craft()->elements->deleteElementById($entryIds);

	    $affectedRows = craft()->db->createCommand()->delete('nb_navigations', array('id' => $navigationId));

	    if ($transaction !== null) { $transaction->commit(); }
	    return (bool) $affectedRows;
	  } catch (\Exception $e) {
	    if ($transaction !== null) { $transaction->rollback(); }
	    throw $e;
	  }
	}


}
