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




	public function actionNavigations()
	{
		$variables['pageTitle'] = Craft::t('Navigations');

		$this->renderTemplate('navigationbuilder/navigation/index', $variables);
	}


	

}
