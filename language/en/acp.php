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

	'ACP_CALENDARMONO_SETTING_SAVED'	=> 'Settings have been saved successfully!',

// repository link

	'ACP_CALENDARMONO_REPO_LINK'		=> 'Enable link to the Calendar extension repository in copyright footer',

// input_range

	'ACP_CALENDARMONO_LOWER_LIMIT_DAYS'				=> 'Lower limit when a event may start.',
	'ACP_CALENDARMONO_LOWER_LIMIT_DAYS_EXPLAIN'		=> 'Measured from now in days (value may be negative)',
	'ACP_CALENDARMONO_UPPER_LIMIT_DAYS'				=> 'Upper limit when a event may start.',
	'ACP_CALENDARMONO_UPPER_LIMIT_DAYS_EXPLAIN'		=> 'Measured from now in days (value may be negative)',
	'ACP_CALENDARMONO_MIN_DURATION_DAYS'			=> 'Minimum duration of an event in days.',
	'ACP_CALENDARMONO_MIN_DURATION_DAYS_EXPLAIN'	=> '',
	'ACP_CALENDARMONO_MAX_DURATION_DAYS'			=> 'Maximum duration of an event in days.',
	'ACP_CALENDARMONO_MAX_DURATION_DAYS_EXPLAIN'	=> 'Must be longer than the minimum duration',

// input_format

// input_forums

	'ACP_CALENDARMONO_INPUT_FORUMS'			=> 'Input forums',
	'ACP_CALENDARMONO_INPUT_FORUMS_EXPLAIN'	=> 'Select which in forums topics can be calenda events.',
	'ACP_CALENDARMONO_INPUT_FORUMS_ENABLED'	=> 'Enabled',
	'ACP_CALENDARMONO_INPUT_FORUMS_REQUIRED'	=> 'Required',

// include_assets

	'ACP_CALENDARMONO_DIRECTORY_LIST_FAIL'		=> 'Failed to list content of directory %s',
	'ACP_CALENDARMONO_INCLUDE_ASSETS'			=> 'Include assets',
	'ACP_CALENDARMONO_JQUERY_UI_DATEPICKER'
											=> 'Include jQuery UI Datepicker.',
	'ACP_CALENDARMONO_JQUERY_UI_DATEPICKER_EXPLAIN'
											=> 'Disable when already included by another extension.',
	'ACP_CALENDARMONO_JQUERY_UI_DATEPICKER_I18N'
											=> 'Include jQuery UI Datepicker i18n',
	'ACP_CALENDARMONO_JQUERY_UI_DATEPICKER_I18N_EXPLAIN'
											=> 'Disable when already included by another extension.',
	'ACP_CALENDARMONO_DATEPICKER_THEME'			=> 'jQuery UI Datepicker theme',
	'ACP_CALENDARMONO_DATEPICKER_THEME_EXPLAIN'	=> 'Select none if another extension has already included one.',
	'ACP_CALENDARMONO_DATEPICKER_THEME_NONE'	=> '-- none --',
]);
