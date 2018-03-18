<?php
/**
* phpBB Extension - marttiphpbb calendarinput
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarinput\migrations;

class v_0_1_0 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		$input_settings = [
			'include_assets'	=> 3,
			'datepicker_theme'	=> 'smoothness',
			'lower_limit'		=> 0,
			'upper_limit'		=> 720,
			'min_duration'		=> 0,
			'max_duration'		=> 30,
			'forums'			=> [],
		];

		return [
			['config_text.add', ['marttiphpbb_calendarinput_settings', serialize($input_settings)]],
			['config.add', ['marttiphpbb_calendarinput_repo_link', 1]],

			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_CALENDARINPUT'
			]],
			['module.add', [
				'acp',
				'ACP_CALENDARINPUT',
				[
					'module_basename'	=> '\marttiphpbb\calendarinput\acp\main_module',
					'modes'				=> [
						'input',
						'input_forums',
						'include_assets',
						'repo_link',
					],
				],
			]],
		];
	}

	public function update_schema()
	{
		return [
			'add_columns'        => [
				$this->table_prefix . 'topics'        => [
					'topic_calendar_start_day'  => ['UINT', NULL],
					'topic_calendar_end_day' 	=> ['UINT', NULL],
				],
			],
		];
	}

	public function revert_schema()
	{
		return [
			'drop_columns'        => [
				$this->table_prefix . 'topics'        => [
					'topic_calendar_start_day',
					'topic_calendar_end_day',
				],
			],
		];
	}
}
