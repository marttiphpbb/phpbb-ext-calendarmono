<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2019 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\migrations;

use marttiphpbb\calendarmono\util\cnst;

class mgr_1 extends \phpbb\db\migration\migration
{
	static public function depends_on():array
	{
		return [
			'\phpbb\db\migration\data\v330\v330',
		];
	}

	public function update_schema():array
	{
		return [
			'add_columns'        => [
				$this->table_prefix . 'topics'        => [
					cnst::COLUMN_START  => ['UINT', NULL],
					cnst::COLUMN_END 	=> ['UINT', NULL],
				],
			],
		];
	}

	public function revert_schema():array
	{
		return [
			'drop_columns'        => [
				$this->table_prefix . 'topics' => [
					cnst::COLUMN_START,
					cnst::COLUMN_END,
				],
			],
		];
	}
}
