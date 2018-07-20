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

	'CALENDARMONO_DATES_WRONG_ORDER_ERROR'	=> 'Calendar dates are in wrong order.',

	'CALENDARMONO_TOO_LONG_PERIOD_ERROR'	=> [
		1	=> 'The calendarmono period can be maximum 1 day long.',
		2	=> 'The calendarmono period exceeds the maximum of %s days',
	],
	'CALENDARMONO_START_DATE_ERROR'	=> 'Incorrect start date',
	'CALENDARMONO_END_DATE_ERROR'		=> 'Incorrect end date',

	'CALENDARMONO_EVENT_DATE'		=> 'Date',
	'CALENDARMONO_TO'				=> 'to',
]);
