<?php
namespace Craft;

class NavigationBuilderVariable
{
	/**
	 * Get All Forms
	 * 
	 */
	public function getAllForms()
	{
		$navigations = craft()->navigationBuilder_navigation->getAllNavigations();
		return $navigations;
	}

}
