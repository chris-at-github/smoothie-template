<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Helper registrieren
JLoader::register('TplSmoothieModuleHelper', JPATH_SITE . '/templates/' . $this->template . '/helpers/module.php');
JLoader::register('TplSmoothieLessHelper', JPATH_SITE . '/templates/' . $this->template . '/helpers/less.php');

// Add JavaScript Frameworks
//JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet(TplSmoothieLessHelper::compile('templates/'.$this->template.'/less/template.less', 'templates/'.$this->template.'/css/template.css'));

?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />

	<!--[if lt ie 9]><script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script><![endif]-->
</head>
<body class="">

	<header id="page-header">
		<div class="row">
			<div id="logo" class="col-md-3"><a href="<?php echo $this->baseurl; ?>">Smoothie</a></div>
			<div id="search" class="col-md-9"><jdoc:include type="modules" name="search" style="container" /></div>
		</div>

		<jdoc:include type="modules" name="mainmenu" style="navigation" id="mainmenu" class="clearfix" />
	</header>

	<!-- Begin Content -->
	<jdoc:include type="message" />
	<jdoc:include type="component" />
	<!-- End Content -->

	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
