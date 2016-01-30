<?php
namespace Craft;

class NavigationBuilder_NavnodeController extends BaseController
{

	protected $allowAnonymous = true;

	/**
	 * Get All Navnodes
	 *
	 */
	public function actionNavnodesIndex()
	{ 

	  $navnodes = craft()->navigationBuilder_navnode->getAllNavnodes();
	  $variables['pageTitle']     = Craft::t('Navigation Builder');
	  $variables['navnodes']   = $navnodes;

	  return $this->renderTemplate('navigationbuilder/navnodes/index', $variables);
	}

	/**
	 * View/Edit Nvanode
	 *
	 */
	public function actionCreateEditNavnode(array $variables = array())
	{
	  $variables['brandNewNavnode'] = false;

	  if (!empty($variables['navnodeId'])) {
	    if (empty($variables['navnode'])) {
	      $variables['navnode'] = craft()->navigationBuilder_navnode->getNavnodeById($variables['navnodeId']);
	      if (!$variables['navnode']) { 
	        throw new HttpException(404);
	      }
	    }
	    $variables['title'] = $variables['navnode']->name;
	  } else {
	    if (empty($variables['navnode'])) {
	      $variables['navnode'] = new NavigationBuilder_NavnodeModel();
	      $variables['brandNewNavnode'] = true;
	    }
	    $variables['title'] = Craft::t('Creating New Navnode');
	  }

	  $this->renderTemplate('navigationbuilder/navnodes/_edit', $variables);
	}

	/**
	 * Saves New Navnode
	 *
	 */
	public function actionSaveNavnode()
	{
	  $this->requirePostRequest();
	  $navnode = new NavigationBuilder_NavnodeModel();

	  $navnode->id             = craft()->request->getPost('navnodeId');
	  $navnode->name           = craft()->request->getPost('name');
	  $navnode->handle         = craft()->request->getPost('handle');
	  $navnode->description    = craft()->request->getPost('description');

	  if ($navnode->validate()) {
		  if (craft()->navigationBuilder_navnode->saveNavnodeService($navnode)) {
		    craft()->userSession->setNotice(Craft::t('Navnode saved'));
		    $this->redirectToPostedUrl($navnode);
		  } else {
		    craft()->userSession->setError(Craft::t('Could not save navnode'));
		  }
	  } else {
      $navnode->getErrors();
	  }

	  craft()->urlManager->setRouteVariables(array(
	    'navnode' => $navnode
	  ));
	}

		/**
	   * Delete Navnode
	   *
	   */
	  public function actionDeleteNavnode()
	  {
	    $this->requirePostRequest();
	    $this->requireAjaxRequest();

	    $navnodeId = craft()->request->getRequiredPost('id');

	    craft()->navigationBuilder_navnode->deleteNavnodeById($navnodeId);
	    $this->returnJson(array('success' => true));
	  }

	

}
