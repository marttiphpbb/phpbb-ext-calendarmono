<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2019 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\event;

use phpbb\event\data as event;

use marttiphpbb\calendarmono\util\cnst;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class input_listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return [
			'marttiphpbb.calendarmonoinput.tpl_vars'
				=> ['marttiphpbb_calendarmonoinput_tpl_vars', 100],
		];
	}

	public function marttiphpbb_calendarmonoinput_tpl_vars(event $event)
	{
		$ext = $event['ext'];

		if ($ext)
		{
			return;
		}

		$start_jd = $event['start_jd'];
		$end_jd = $event['end_jd'];
		$topic_data = $event['topic_data'];

		if (isset($topic_data[cnst::COLUMN_START])
			&& $topic_data[cnst::COLUMN_START]
			&& isset($topic_data[cnst::COLUMN_END])
			&& $topic_data[cnst::COLUMN_END])
		{
			$start_jd = $topic_data[cnst::COLUMN_START];
			$end_jd = $topic_data[cnst::COLUMN_END];
		}

		$ext = cnst::FOLDER;

		$event['start_jd'] = $start_jd;
		$event['end_jd'] = $end_jd;
		$event['ext'] = $ext;
 	}
}
