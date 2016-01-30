<?php
namespace Craft;

class NavigationBuilder_NavnodeService extends BaseApplicationComponent
{
	
	private $_navnodesById;
	private $_fetchedAllNavnodes = false;

	/**
	 * Get All Form
	 *
	 */
	public function getAllNavnodes($indexBy = null)
	{
	  if (!$this->_fetchedAllNavnodes) {
	    $navnodeRecord = NavigationBuilder_NavnodeRecord::model()->ordered()->findAll();
	    $this->_navnodesById = NavigationBuilder_NavnodeModel::populateModels($navnodeRecord, 'id');
	    $this->_fetchedAllNavnodes = true;
	  }

	  if ($indexBy == 'id') {
	    return $this->_navnodesById;
	  } else if (!$indexBy) {
	    return array_values($this->_navnodesById);
	  } else {
	    $navnodes = array();
	    foreach ($this->_navnodesById as $navnode) {
	      $navnodes[$navnode->$indexBy] = $navnode;
	    }
	    return $navnodes;
	  }
	}


	/**
	 * Get Navnode By Handle
	 *
	 */
	public function getNavnodeByHandle($navnodeHandle)
	{
	  $navnodeRecord = NavigationBuilder_NavnodeRecord::model()->findByAttributes(array(
	    'handle' => $navnodeHandle
	  ));

	  if ($navnodeRecord) {
	    return NavigationBuilder_NavnodeModel::populateModel($navnodeRecord);
	  }
	}

	/**
	 * Get Navnode by ID
	 *
	 */
	public function getNavnodeById($navnodeId)
	{
	  if (!isset($this->_navnodesById) || !array_key_exists($navnodeId, $this->_navnodesById)) {
	    $navnodeRecord = NavigationBuilder_NavnodeRecord::model()->findById($navnodeId);

	    if ($navnodeRecord) {
	      $this->_navnodesById[$navnodeId] = NavigationBuilder_NavnodeModel::populateModel($navnodeRecord);
	    } else {
	      $this->_navnodesById[$navnodeId] = null;
	    }
	  }
	  return $this->_navnodesById[$navnodeId];
	}


	/**
	 * Save New Navnode
	 *
	 */
	public function saveNavnodeService(NavigationBuilder_NavnodeModel $navnode)
	{
	  if ($navnode->id) {
	    $navnodeRecord = NavigationBuilder_NavnodeRecord::model()->findById($navnode->id);

	    if (!$navnodeRecord) {
	      throw new Exception(Craft::t('No navnode exists with the ID “{id}”', array('id' => $navnode->id)));
	    }
	    $isNewNavnode = false;
	  } else {
	    $navnodeRecord = new NavigationBuilder_NavnodeRecord();
	    $isNewNavnode = true;
	  }

	  $navnodeRecord->name               = $navnode->name;
	  $navnodeRecord->handle             = $navnode->handle;
	  $navnodeRecord->description        = $navnode->description;
	  // $navnodeRecord->navNode         = JsonHelper::encode($navnode->navNode);
	  
	  $navnodeRecord->validate();
	  $navnode->addErrors($navnodeRecord->getErrors());

	  if (!$navnode->hasErrors()) {
	    $transaction = craft()->db->getCurrentTransaction() === null ? craft()->db->beginTransaction() : null;
	    try {

	      $navnodeRecord->save();

	      if (!$navnode->id) { $navnode->id = $navnodeRecord->id; }

	      $this->_navnodesById[$navnode->id] = $navnode;

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
	public function deleteNavnodeById($navnodeId)
	{ 
	  if (!$navnodeId) { return false; }

	  $transaction = craft()->db->getCurrentTransaction() === null ? craft()->db->beginTransaction() : null;
	  try {

	    // Delete all navNodes
	    // $entryIds = craft()->db->createCommand()
	    //   ->select('id')
	    //   ->from('formbuilder2_entries')
	    //   ->where(array('navnodeId' => $navnodeId))
	    //   ->queryColumn();
	    // craft()->elements->deleteElementById($entryIds);

	    $affectedRows = craft()->db->createCommand()->delete('nb_navnode', array('id' => $navnodeId));

	    if ($transaction !== null) { $transaction->commit(); }
	    return (bool) $affectedRows;
	  } catch (\Exception $e) {
	    if ($transaction !== null) { $transaction->rollback(); }
	    throw $e;
	  }
	}


}
