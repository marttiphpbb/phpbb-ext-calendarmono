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
			'marttiphpbb.calendar.view'
				=> 'marttiphpbb_calendar_view',
		];
	}

	public function marttiphpbb_calendar_view(event $event)
	{
		$start_jd = $event['start_jd'];
		$end_jd = $event['end_jd'];
		$events = $event['events'];

		$events = array_merge($events, $this->repo->get_all_for_period($start_jd, $end_jd));

		$event['events'] = $events;
 	}
}
