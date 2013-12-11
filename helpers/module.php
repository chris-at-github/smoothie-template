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

abstract class TplSmoothieModuleHelper {
	public static function normalizeAttributes(&$params, &$attribs) {
		$htmlAttributes	= array();
		$return					= '';

		if(isset($attribs['id']) === true && $attribs['id'] !== '') {
			$htmlAttributes['id'] = htmlspecialchars($attribs['id']);
		}

		$htmlAttributes['class'] = array();
		if($params->get('moduleclass_sfx') !== '' && $params->get('moduleclass_sfx') !== null) {
			$htmlAttributes['class'][] = 'container' . str_replace('_', '-', htmlspecialchars($params->get('moduleclass_sfx')));
		}

		if(isset($attribs['class']) === true && $attribs['class'] !== '') {
			$htmlAttributes['class'][] = htmlspecialchars($attribs['class']);
		}

		foreach($htmlAttributes as $name => $value) {
			if(is_array($value) === true) {
				$return .= $name . '="' . implode(' ', $value) . '" ';
			} else {
				$return .= $name . '="' . $value . '" ';
			}
		}

		return trim($return);
	}
}

?>