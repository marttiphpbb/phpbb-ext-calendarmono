<?php
/**
* phpBB Extension - marttiphpbb calendar
* @copyright (c) 2014 - 2016 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendar\migrations;

class v_0_1_0 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		$input_settings = [
			'lower_limit_days'		=> 0,
			'upper_limit_days'		=> 365,
			'min_duration_days'		=> 1,
			'max_duration_days'		=> 30,
			'forums'				=> [],
		];

		return [

			['config_text.add', ['marttiphpbb_calendar_input', serialize($input_settings)]],

			['config.add', ['calendar_default_view', 'month']],
			['config.add', ['calendar_first_weekday', 0]],

			['config.add', ['calendar_links', 2]],
			['config.add', ['calendar_include_assets', 3]],
			['config.add', ['calendar_datepicker_theme', 'smoothness']],
			['config.add', ['calendar_render_settings', 7]],

			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_CALENDAR'
			]],
			['module.add', [
				'acp',
				'ACP_CALENDAR',
				[
					'module_basename'	=> '\marttiphpbb\calendar\acp\main_module',
					'modes'				=> [
						'rendering',
						'input',
						'input_forums',
						'include_assets',
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
					'topic_calendar_start'  		=> ['UINT', NULL],
					'topic_calendar_end' 			=> ['UINT', NULL],
				],
			],
		];
	}

	public function revert_schema()
	{
		return [
			'drop_columns'        => [
				$this->table_prefix . 'topics'        => [
					'topic_calendar_start',
					'topic_calendar_end',
				],
			],
		];
	}
}
