<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\service;

use phpbb\db\driver\factory as db;
use phpbb\content_visibility;
use phpbb\auth\auth;
use phpbb\user;
use marttiphpbb\calendarmono\util\cnst;

class repo
{
	protected $db;
	protected $auth;
	protected $user;
	protected $topics_table;

	public function __construct(
		db $db,
		content_visibility $content_visibility,
		auth $auth,
		user $user,
		string $topics_table
	)
	{
		$this->db = $db;
		$this->content_visibility;
		$this->auth = $auth;
		$this->user = $user;
		$this->topics_table = $topics_table;
	}

	public function get_events_by_topic(int $topic_id):array
	{



	}

	public function get_all_for_period(int $start_jd, int $end_jd):array
	{
		$ary = [];

		$forum_ids = array_keys($this->auth->acl_getf('f_read', true));

		$sql = 'select t.topic_id, t.forum_id, t.topic_reported, t.topic_title,
			t.' . cnst::COLUMN_START . ', t.' . cnst::COLUMN_END . '
			from ' . $this->topics_table . ' t
			where ( t.' . cnst::COLUMN_START . ' <= ' . $end_jd . '
				and t.' . cnst::COLUMN_END . ' >= ' . $start_jd . ' )
				and ' . $this->db->sql_in_set('t.forum_id', $forum_ids, false, true) . '
				and ' . $this->content_visibility->get_forums_visibility_sql('topic', $forum_ids, 't.') . '
				and ' . $this->db->sql_in_set('t.topic_type', [POST_NORMAL, POST_STICKY]) . '
			order by t.' . cnst::COLUMN_START;
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			if (!isset($ary[$row['topic_id']]))
			{
				$ary[$row['topic_id']] = [
					'data'	=> [
						'forum_id'			=> $row['forum_id'],
						'topic_reported'	=> $row['topic_reported'],
						'topic_title'		=> $row['topic_title'],
					],
				];
			}

			$ary[$row['topic_id']]['events'][] = [
				'start_jd'	=> $row[cnst::COLUMN_START],
				'end_jd'	=> $row[cnst::COLUMN_END],
			];
		}

		$this->db->sql_freeresult($result);

		return $ary;
	}
}
