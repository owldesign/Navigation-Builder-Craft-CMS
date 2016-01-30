<?php
namespace Craft;

class NavigationBuilder_NavigationController extends BaseController
{

	protected $allowAnonymous = true;


	/**
	 * Get All Navigations
	 *
	 */
	public function actionNavigationsIndex()
	{ 

	  $navigations = craft()->navigationBuilder_navigation->getAllNavigations();
	  $variables['pageTitle']     = Craft::t('Navigation Builder');
	  $variables['navigations']   = $navigations;

	  return $this->renderTemplate('navigationbuilder/navigation/index', $variables);
	}


	/**
	 * View/Edit Navigation
	 *
	 */
	public function actionCreateEditNavigation(array $variables = array())
	{
	  $variables['brandNewNavigation'] = false;

	  if (!empty($variables['navigationId'])) {
	    if (empty($variables['navigation'])) {
	      $variables['navigation'] = craft()->navigationBuilder_navigation->getNavigationById($variables['navigationId']);
	      //  MAKE SERVICE FOR getNavigationById()
	      if (!$variables['navigation']) { 
	        throw new HttpException(404);
	      }
	    }
	    $variables['title'] = $variables['navigation']->name;
	  } else {
	    if (empty($variables['navigation'])) {
	      $variables['navigation'] = new NavigationBuilder_NavigationModel();
	      $variables['brandNewNavigation'] = true;
	    }
	    $variables['title'] = Craft::t('Creating New Navigation');
	  }

	  $this->renderTemplate('navigationbuilder/navigation/_edit', $variables);
	}

	/**
	 * Saves New Navigation
	 *
	 */
	public function actionSaveNavigation()
	{
	  $this->requirePostRequest();
	  $navigation = new NavigationBuilder_NavigationModel();

	  $navigation->id             = craft()->request->getPost('navigationId');
	  $navigation->name           = craft()->request->getPost('name');
	  $navigation->handle         = craft()->request->getPost('handle');
	  $navigation->description    = craft()->request->getPost('description');

	  if ($navigation->validate()) {
		  if (craft()->navigationBuilder_navigation->saveNavigationService($navigation)) {
		    craft()->userSession->setNotice(Craft::t('Navigation saved'));
		    $this->redirectToPostedUrl($navigation);
		  } else {
		    craft()->userSession->setError(Craft::t('Could not save navigation'));
		  }
	  } else {
      $navigation->getErrors();
	  }

	  craft()->urlManager->setRouteVariables(array(
	    'navigation' => $navigation
	  ));
	}


	/**
   * Delete Navigation
   *
   */
  public function actionDeleteNavigation()
  {
    $this->requirePostRequest();
    $this->requireAjaxRequest();

    $navigationId = craft()->request->getRequiredPost('id');

    craft()->navigationBuilder_navigation->deleteNavigationById($navigationId);
    $this->returnJson(array('success' => true));
  }




	// public function actionExampleFormSubmit()
	// {
	// 	$this->redirect('thankyou/page/url');
	// }

	 // *     // example uses jQuery
	 // *     $.post('actions/businessLogic/exampleAjax' ...
	 // *     Craft.postActionRequest('businessLogic/exampleAjax' ...
	// public function actionExampleAjax()
	// {
	// 	$this->requireAjaxRequest();
	// 	$response = array('response' => 'Round trip via AJAX!');
	// 	$this->returnJson($response);
	// }




	// public function actionCreateNavigation()
	// {
	// 	$variables['pageTitle'] = Craft::t('Navigations');

	// 	$this->renderTemplate('navigationbuilder/navigation/index', $variables);
	// }




}
