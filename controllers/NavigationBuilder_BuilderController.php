<?php
namespace Craft;

class NavigationBuilder_BuilderController extends BaseController
{

	protected $allowAnonymous = true;
	
	/**
	 * View/Edit Builder
	 *
	 */
	public function actionCreateEditBuilder(array $variables = array())
	{
		$variables['title'] = 'Navigation Builder';
		$variables['crumbs'] = array(
			array('label' => Craft::t('Navigation Builder'), 'url' => UrlHelper::getUrl('navigationbuilder')),
			array('label' => Craft::t('Builder'),   'url' => UrlHelper::getUrl('navigationbuilder/builder')),
			array('label' => Craft::t('Primary Name'),  'url' => UrlHelper::getUrl('navigationbuilder/builder/1')),
		);

		$this->renderTemplate('navigationbuilder/builder/_edit', $variables);
	}	

}
