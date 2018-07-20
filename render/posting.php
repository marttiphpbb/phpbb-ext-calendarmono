<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\render;

use phpbb\template\template;
use phpbb\language\language;
use marttiphpbb\calendarmono\repository\settings;

class posting
{
	/** @var settings */
	private $settings;

	/** @var template */
	private $template;

	/** @var language */
	private $language;

	/**
	 * @param settings $settings
	* @param template	$template
	* @param language		$language
	*/
	public function __construct(
		settings $settings,
		template $template,
		language $language
	)
	{
		$this->settings = $settings;
		$this->template = $template;
		$this->language = $language;
	}

	/*
	 * @param int
	 * @param array
	 */
	public function assign_template_vars(int $forum_id, array $post_data)
	{
		$enabled = $this->settings->get_enabled($forum_id);

		if (!$enabled)
		{
			return;
		}

		$this->template->assign_vars([
			'S_CALENDARMONO_INPUT'				=> true,
			'S_CALENDARMONO_REQUIRED'			=> $this->settings->get_required($forum_id),
			'CALENDARMONO_DATE_FORMAT'			=> 'yyyy-mm-dd',
			'CALENDARMONO_DATE_START'			=> isset($post_data['topic_calendarmono_start']) ? gmdate('Y-m-d', $post_data['topic_calendarmono_start']) : '', 
			'CALENDARMONO_DATE_END'			=> isset($post_data['topic_calendarmono_end']) ? gmdate('Y-m-d', $post_data['topic_calendarmono_end']) : '',
		]);
	}
}
