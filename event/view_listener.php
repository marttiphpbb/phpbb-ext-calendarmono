<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2020 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\event;

use phpbb\event\data as event;

use marttiphpbb\calendarmono\service\repo;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class view_listener implements EventSubscriberInterface
{
	protected $repo;

	public function __construct(repo $repo)
	{
		$this->repo = $repo;
	}

	static public function getSubscribedEvents():array
	{
		return [
			'marttiphpbb.calendar.view'
				=> 'marttiphpbb_calendar_view',
			'marttiphpbb.calendar.view_forum'
				=> 'marttiphpbb_calendar_view_forum',
		];
	}

	public function marttiphpbb_calendar_view(event $event):void
	{
		$start_jd = $event['start_jd'];
		$end_jd = $event['end_jd'];
		$events = $event['events'];

		$events = array_merge($events,
			$this->repo->get_for_period($start_jd, $end_jd));

		$event['events'] = $events;
	 }

	 public function marttiphpbb_calendar_view_forum(event $event):void
	 {
		 $start_jd = $event['start_jd'];
		 $end_jd = $event['end_jd'];
		 $forum_id = $event['forum_id'];
		 $events = $event['events'];

		 $events = array_merge($events,
		 	$this->repo->get_for_period_and_forum($start_jd, $end_jd, $forum_id));

		 $event['events'] = $events;
	  }
}
