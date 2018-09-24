<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\event;

use phpbb\event\data as event;

use marttiphpbb\calendarmono\service\repo;
use marttiphpbb\calendarmono\util\cnst;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class view_listener implements EventSubscriberInterface
{
	protected $repo;

	public function __construct(repo $repo)
	{
		$this->repo = $repo;
	}

	static public function getSubscribedEvents()
	{
		return [
			'marttiphpbb.calendar.archive'
				=> 'marttiphpbb_calendar_archive',
		];
	}

	public function marttiphpbb_calendar_archive(event $event)
	{
		$ref_jd = $event['ref_jd'];
		$ignore_forum_id = $event['ignore_forum_id'];
		$events = $event['events'];

		$events = array_merge($events, $this->repo->get_all_after($ref_jd, $ignore_forum_id));

		$event['events'] = $events;
 	}
}
