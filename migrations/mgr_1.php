<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\migrations;

class mgr_1 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return [
			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_CALENDARMONO'
			]],
			['module.add', [
				'acp',
				'ACP_CALENDARMONO',
				[
					'module_basename'	=> '\marttiphpbb\calendarmono\acp\main_module',
					'modes'				=> [
						'input_range',
						'input_format',
						'input_forums',
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
