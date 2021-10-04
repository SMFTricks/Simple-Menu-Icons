<?php

/**
 * @package Simple Menu Icons
 * @version 2.0
 * @author Diego Andrés <diegoandres_cortes@outlook.com>
 * @copyright Copyright (c) 2021, SMF Tricks
 * @license https://www.mozilla.org/en-US/MPL/2.0/
 */

if (!defined('SMF'))
	die('No direct access...');

class SimpleMenuIcons
{
	/**
	 * @var array The main menu
	 */
	private static $_menu = [];

	/**
	 * SimpleMenuIcons::settings()
	 *
	 * Add the smi settings
	 *
	 * @param array $config_vars The mods general settings
	 * @return void
	 */
	public static function settings(&$config_vars)
	{
		global $txt;

		// Language
		loadLanguage('SMI/');

		// Sad lonely setting
		$config_vars []= ['check', 'smi_enable', 'subtext' => $txt['smi_desc']];
	}

	/**
	 * SimpleMenuIcons::menu()
	 *
	 * Add the icons to the title of every button
	 *
	 * @param array $buttons The main menu buttons
	 */
	public static function menu(&$buttons)
	{
		global $settings, $modSettings;

		// Are the icons enabled
		if (!empty($modSettings['smi_enable']))
		{
			self::$_menu = [];
			foreach ($buttons as $action => $button)
			{
				// Insert the action
				self::$_menu[$action] = $button;
				// We have a title?
				if (isset($button['title']) && !empty($button['title']))
					self::$_menu[$action]['title'] = '<img style="vertical-align: middle;" src="' . $settings['images_url'] .  '/smi/' . $action . '.png" alt="' . $button['title'] . '" title="' . $button['title'] . '"/> ' . $button['title'];
				// Sub-Buttons?
				if (isset($button['sub_buttons']) && !empty($button['sub_buttons']))
				{
					foreach ($button['sub_buttons'] as $subaction => $sub_button)
					{
						self::$_menu[$action]['sub_buttons'][$subaction]['title'] = '<img style="vertical-align: middle;" src="' . $settings['images_url'] .  '/smi/' . $subaction . '.png" alt="' . $sub_button['title'] . '" title="' . $sub_button['title'] . '"/> ' . $sub_button['title'];
					}
				}
			}
			// Replace menu
			$buttons = self::$_menu;
		}
	}
}