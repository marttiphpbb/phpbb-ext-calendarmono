<?php

/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [

	'ACP_MARTTIPHPBB_CALENDARMONO_SETTINGS_SAVED'	=> 'Settings have been saved successfully!',

// input_range

	'ACP_MARTTIPHPBB_CALENDARMONO_LOWER_LIMIT_DAYS'				=> 'Lower limit when a event may start.',
	'ACP_MARTTIPHPBB_CALENDARMONO_LOWER_LIMIT_DAYS_EXPLAIN'		=> 'Measured from now in days (value may be negative)',
	'ACP_MARTTIPHPBB_CALENDARMONO_UPPER_LIMIT_DAYS'				=> 'Upper limit when a event may start.',
	'ACP_MARTTIPHPBB_CALENDARMONO_UPPER_LIMIT_DAYS_EXPLAIN'		=> 'Measured from now in days (value may be negative)',
	'ACP_MARTTIPHPBB_CALENDARMONO_MIN_DURATION_DAYS'			=> 'Minimum duration of an event in days.',
	'ACP_MARTTIPHPBB_CALENDARMONO_MIN_DURATION_DAYS_EXPLAIN'	=> '',
	'ACP_MARTTIPHPBB_CALENDARMONO_MAX_DURATION_DAYS'			=> 'Maximum duration of an event in days.',
	'ACP_MARTTIPHPBB_CALENDARMONO_MAX_DURATION_DAYS_EXPLAIN'	=> 'Must be longer than the minimum duration',
]);
