<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2019 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\event;

use phpbb\event\data as event;

use marttiphpbb\calendarmono\service\repo;
use marttiphpbb\calendarmono\util\cnst;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class calendarautoarchive_listener implements EventSubscriberInterface
{
	protected $repo;

	public function __construct(repo $repo)
	{
		$this->repo = $repo;
	}

	static public function getSubscribedEvents()
	{
		return [
			'marttiphpbb.calendarautoarchive.get_events'
				=> 'get_events',
		];
	}

	public function get_events(event $event)
	{
		$ref_jd = $event['ref_jd'];
		$ignore_forum_id = $event['ignore_forum_id'];
		$events = $event['events'];

		$events = array_merge($events, $this->repo->get_all_before($ref_jd, $ignore_forum_id));

		$event['events'] = $events;
 	}
}
