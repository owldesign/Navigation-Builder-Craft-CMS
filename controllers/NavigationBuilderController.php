<?php
namespace Craft;

class NavigationBuilderController extends BaseController
{

	protected $allowAnonymous = true;

	// public function actionExampleFormSubmit()
	// {
	// 	$this->redirect('thankyou/page/url');
	// }

	 // *     // example uses jQuery
	 // *     $.post('actions/businessLogic/exampleAjax' ...
	 // *     Craft.postActionRequest('businessLogic/exampleAjax' ...
	public function actionExampleAjax()
	{
		$this->requireAjaxRequest();
		$response = array('response' => 'Round trip via AJAX!');
		$this->returnJson($response);
	}




	public function actionIndex()
	{
		$variables['navigations'] = craft()->navigationBuilder_navigation->getAllNavigations();
		$this->renderTemplate('navigationbuilder/navnodes/index', $variables);
	}


	

}
