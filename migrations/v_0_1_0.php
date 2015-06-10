<?php
/**
* phpBB Extension - marttiphpbb calendar
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendar\migrations;

class v_0_1_0 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		$default_input_settings = array(
			'max_length'	=> 240,
			'min_gap'		=> 60,
			'max_gap'		=> 43200,
			'granularity'	=> 15,
//				'color_en'		=> false,
			'forums'		=> array(),
		);

		return array(
/*			array('config.add', array('calendar_show_isoweek', 1)),
			array('config.add', array('calendar_show_moon', 1)),
			array('config.add', array('calendar_show_today', 1)),
*/
			array('config_text.add', array('marttiphpbb_calendar_input', serialize($default_input_settings))),

			array('config.add', array('calendar_default_view', 'month')),
			array('config.add', array('calendar_first_weekday', 0)),

			array('config.add', array('calendar_menu_quick', 0)),
			array('config.add', array('calendar_menu_header', 1)),
			array('config.add', array('calendar_menu_footer', 0)),
			array('config.add', array('calendar_hide_github_link', 0)),

			array('config.add', array('calendar_color_en', 0)),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_CALENDAR'
			)),
			array('module.add', array(
				'acp',
				'ACP_CALENDAR',
				array(
					'module_basename'	=> '\marttiphpbb\calendar\acp\main_module',
					'modes'				=> array(
						'links',
						'rendering',
						'input',
					),
				),
			)),
		);
	}

	public function update_schema()
	{
		return array(
			'add_columns'        => array(
				$this->table_prefix . 'topics'        => array(
					'topic_calendar_start'  		=> array('UINT', 0),
					'topic_calendar_end' 			=> array('UINT', 0),
					'topic_calendar_event_id'		=> array('UINT', 0),
					'topic_calendar_event_pos'		=> array('UINT', 0),
					'topic_calendar_event_num'		=> array('UINT', 0),
					'topic_calendar_class'			=> array('UINT', 0),
				),
/*
				$this->table_prefix . 'forums'		=> array(
					'forum_calendar_max_events'		=> array('UINT', 0),
					'forum_calendar_multi_day'		=> array('BOOL', 0),
					'forum_calendar_input_format'	=> array('UINT', 0),
					'forum_calendar_color'			=> array('VCHAR:6', ''),
					'forum_calendar_default_length'	=> array('UINT', 60),

				),*/
			),

			'add_tables'		=> array(
				$this->table_prefix . 'calendar_events'	=> array(
					'COLUMNS'	=> array(
						'calendar_event_id'     => array('UINT', NULL, 'auto_increment'),
						'calendar_topic_id'		=> array('UINT', 0),
						'calendar_start'		=> array('UINT', 0),
						'calendar_end'			=> array('UINT', 0),
					),
					'PRIMARY_KEY'  	=> 'calendar_event_id',
					'KEYS' 		=> array(
						'tid'		=> array('INDEX', 'calendar_topic_id'),
					),
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns'        => array(
				$this->table_prefix . 'topics'        => array(
					'topic_calendar_start',
					'topic_calendar_end',
					'topic_calendar_event_id',
					'topic_calendar_event_pos',
					'topic_calendar_event_num',
					'topic_calendar_color',
				),
/*				$this->table_prefix . 'forums'		=> array(
					'forum_calendar_max_events',
					'forum_calendar_multi_day',
					'forum_calendar_input_format',
					'forum_calendar_color',
					'forum_calendar_default_length'
				),*/
			),
			'drop_tables'	=> array(
				$this->table_prefix . 'calendar_events',
			),
		);
	}

}
