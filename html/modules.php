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

/**
 * Modulausgabe als Container (Standardausgabe)
 *
 * @param stdClass $module Instanz des Moduls
 * @param JRegistry $params Einstellungen des Moduls
 * @param array Array mit den Attributen, mit denen der Modulaufruf im Template
 *	eingetragen ist
 * @return void
 */
function modChrome_container($module, &$params, &$attribs) {

	// -------------------------------------------------------------------------------------
	// Level der Ueberschrift definieren
	$headerLevel = 2;
	if(isset($attribs['headerLevel']) === true) {
		$headerLevel = (int) $attribs['headerLevel'];
	}

	// -------------------------------------------------------------------------------------
	// HTML Attribute der Modulanzeige
	$htmlAttributes = TplSmoothieModuleHelper::normalizeAttributes($params, $attribs);

	// -------------------------------------------------------------------------------------
	// HTML Ausgabe
	if(empty($module->content) === false) {
		echo '<div ' . $htmlAttributes . '>';

		if((int) $module->showtitle === 1) {
			echo '<h' . $headerLevel . '>' . htmlspecialchars($module->title) . '</h' . $headerLevel . '>';
		}

		echo $module->content;
		echo '</div>';
	}
}

/**
 * Modulausgabe als Container (Standardausgabe)
 *
 * @param stdClass $module Instanz des Moduls
 * @param JRegistry $params Einstellungen des Moduls
 * @param array Array mit den Attributen, mit denen der Modulaufruf im Template
 *	eingetragen ist
 * @return void
 */
function modChrome_navigation($module, &$params, &$attribs) {

	// -------------------------------------------------------------------------------------
	// Level der Ueberschrift definieren
	$headerLevel = 2;
	if(isset($attribs['headerLevel']) === true) {
		$headerLevel = (int) $attribs['headerLevel'];
	}

	// -------------------------------------------------------------------------------------
	// HTML Attribute der Modulanzeige
	$htmlAttributes = TplSmoothieModuleHelper::normalizeAttributes($params, $attribs);

	// -------------------------------------------------------------------------------------
	// HTML Ausgabe
	if(empty($module->content) === false) {
		echo '<div ' . $htmlAttributes . '>';
		echo '<nav>';

		if((int) $module->showtitle === 1) {
			echo '<h' . $headerLevel . '>' . htmlspecialchars($module->title) . '</h' . $headerLevel . '>';
		}

		echo $module->content;
		echo '</nav>';
		echo '</div>';
	}
}

?>