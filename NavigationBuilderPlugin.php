<?php
namespace Craft;

class NavigationBuilderPlugin extends BasePlugin
{

	public function getName()
	{
		return Craft::t('Navigation Builder');
	}

	public function getDescription()
	{
		return Craft::t('Navigation Builder for Craft CMS');
	}

	public function getDocumentationUrl()
	{
		return 'https://github.com/owldesign/navigation-builder-craft-cms';
	}

	public function getVersion()
	{
		return '1.0.0';
	}

	public function getSchemaVersion()
	{
		return '0.0.0';
	}

	public function getDeveloper()
	{
		return 'Vadim Goncharov';
	}

	public function getDeveloperUrl()
	{
		return 'https://github.com/owldesign';
	}

	public function hasCpSection()
  {
    return true;
  }

  public function registerCpRoutes()
  {
    return array(
      'navigationbuilder' 																						=> array('action' => 'navigationBuilder/navigation/navigationsIndex'),
      'navigationbuilder/navigation'                        					=> array('action' => 'navigationBuilder/navigation/navigationsIndex'),
      'navigationbuilder/navigation/new'                        			=> array('action' => 'navigationBuilder/navigation/createEditNavigation'),
      'navigationbuilder/navigation/(?P<navigationId>\d+)'            => array('action' => 'navigationBuilder/navigation/createEditNavigation'),
      'navigationbuilder/navigation/(?P<navigationId>\d+)/edit'       => array('action' => 'navigationBuilder/navigation/createEditNavigation'),
    );
  }

}
