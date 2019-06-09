<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;

class PlgSystemNoindex4PG extends CMSPlugin
{
	protected $app;
	
	public function onBeforeCompileHead()
	{
		$doc = Factory::getDocument();

		if ($doc->getType() !== 'html' || !$this->app->isClient('site'))
		{
			return;
		}
		
		$optionsToDo = array(
			'com_phocagallery',
			// Others here
		);
		
		$option = $this->app->input->get('option', '', 'CMD');
		
		if (in_array($option, $optionsToDo))
		{
			$doc->setMetadata('robots', 'noindex,nofollow');
		}
		
	}
}
