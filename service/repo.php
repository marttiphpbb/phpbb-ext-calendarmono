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
	protected $content_visibility;
	protected $auth;
	protected $user;
	protected $topics_table;
	protected $forums_table;

	public function __construct(
		db $db,
		content_visibility $content_visibility,
		auth $auth,
		user $user,
		string $topics_table,
		string $forums_table
	)
	{
		$this->db = $db;
		$this->content_visibility = $content_visibility;
		$this->auth = $auth;
		$this->user = $user;
		$this->topics_table = $topics_table;
		$this->forums_table = $forums_table;
	}

	public function get_for_period(int $start_jd, int $end_jd):array
	{
		$forum_ids = array_keys($this->auth->acl_getf('f_read', true));

		return $this->get_for_period_and_forum_ids($start_jd, $end_jd, $forum_ids);
	}

	public function get_for_period_and_forum(
		int $start_jd,
		int $end_jd,
		int $forum_id
	):array
	{
		$forum_ids = [];
		$forum_acl = $this->auth->acl_getf('f_read', true);

		$sql = 'select f2.forum_id
			from ' . $this->forums_table . ' f1, ' .
				$this->forums_table . ' f2
			where f1.forum_id = ' . $forum_id . '
				and f1.left_id <= f2.left_id
				and f2.right_id >= f1.right_id';

		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			if (isset($forum_acl[$row['forum_id']]))
			{
				$forum_ids[] = $row['forum_id'];
			}
		}

		$this->db->sql_freeresult($result);

		return $this->get_for_period_and_forum_ids($start_jd, $end_jd, $forum_ids);
	}

	public function get_for_period_and_forum_ids(
		int $start_jd,
		int $end_jd,
		array $forum_ids
	):array
	{
		$events = [];

		$sql = 'select t.topic_id, t.forum_id, t.topic_title,
			t.' . cnst::COLUMN_START . ' as start_jd, t.' . cnst::COLUMN_END . ' as end_jd
			from ' . $this->topics_table . ' t
			where (t.' . cnst::COLUMN_START . ' <= ' . $end_jd . '
				and t.' . cnst::COLUMN_END . ' >= ' . $start_jd . ')
				and ' . $this->db->sql_in_set('t.forum_id', $forum_ids, false, true) . '
				and ' . $this->content_visibility->get_forums_visibility_sql('topic', $forum_ids, 't.') . '
				and ' . $this->db->sql_in_set('t.topic_type', [POST_NORMAL, POST_STICKY]) . '
			order by t.' . cnst::COLUMN_START;

		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$events[$row['topic_id']] = $row;
		}

		$this->db->sql_freeresult($result);

		return $events;
	}

	public function get_all_before(int $ref_jd, int $ignore_forum_id):array
	{
		$events = [];

		$forum_ids = array_keys($this->auth->acl_getf('f_read', true));

		$sql = 'select t.topic_id, t.forum_id, t.topic_title,
			t.' . cnst::COLUMN_START . ' as start_jd, t.' . cnst::COLUMN_END . ' as end_jd
			from ' . $this->topics_table . ' t
			where t.' . cnst::COLUMN_END . ' < ' . $ref_jd;
		$sql .= $ignore_forum_id ? ' and t.forum_id <> ' . $ignore_forum_id : '';

		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$events[$row['topic_id']] = $row;
		}

		$this->db->sql_freeresult($result);

		return $events;
	}
}
