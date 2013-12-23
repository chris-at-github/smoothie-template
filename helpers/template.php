<?php
/**
 * @version
 * @package		Joomla.Site
 * @subpackage	Templates
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die();

abstract class TplSmoothieTemplateHelper {
	
	public static function less($in, $out) {
		$application = JFactory::getApplication();

		// Load the RAD layer to use its LESS compiler
		if(!defined('FOF_INCLUDED')) {
			require_once JPATH_LIBRARIES . '/fof/include.php';
		}

		$less = new FOFLess;
		$less->setFormatter(new FOFLessFormatterJoomla);

		try {
			$less->compileFile($in, $out);
			
		}	catch(Exception $e) {
			$application->enqueueMessage($e->getMessage(), 'error');
		}
		
		return $out;
	}
	
	public static function browserCssClass() {
		$cssClass	= array();
		$browser	= JBrowser::getInstance();

		// Browser-Kuerzel
		$cssClass[] = $browser->getBrowser();

		// Browser-Version
		$cssClass[] = $browser->getBrowser() . '-' . $browser->getMajor();

		// Plattform
		$cssClass[] = $browser->getPlatform();

		return implode(' ', $cssClass);
	}

	public static function pageTitleCssClass() {

		// Klasse aus dem Seitentitel
		$document			= JFactory::getDocument();
		$application	= JFactory::getApplication();

		$pagetitle	= $document->title;
		$pagetitle	= str_replace($application->get('sitename'), '', $pagetitle);
		$cssClass		= JFilterOutput::stringURLSafe($pagetitle);

		// Klasse aus der Page Class
		$menu 			= JSite::getMenu()->getActive();
		$pageclass	= $menu->params->get('pageclass_sfx');

		if(empty($pageclass) === false) {
			$cssClass	= ' ' . JFilterOutput::stringURLSafe($pageclass);
		}

		return $cssClass;
	}
}
?>