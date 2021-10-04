<?php

/**
 * @package Simple Menu Icons
 * @version 2.0
 * @author Diego Andrés <diegoandres_cortes@outlook.com>
 * @copyright Copyright (c) 2021, SMF Tricks
 * @license https://www.mozilla.org/en-US/MPL/2.0/
 */

	if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
		require_once(dirname(__FILE__) . '/SSI.php');

	elseif (!defined('SMF'))
		exit('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');

	// So... looking for something new
	$hooks = array(
		'integrate_pre_include' => '$sourcedir/Subs-SMI.php',
		'integrate_menu_buttons' => 'SimpleMenuIcons::menu',
		'integrate_general_mod_settings' => 'SimpleMenuIcons::settings',
	);

	foreach ($hooks as $hook => $function)
		add_integration_function($hook, $function);