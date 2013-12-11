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

// Klasse JBrowser importieren
jimport('joomla.environment.browser');

abstract class TplPlainTemplateHelper {
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
		$pagetitle	= str_replace($application->getCfg('sitename'), '', $pagetitle);
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