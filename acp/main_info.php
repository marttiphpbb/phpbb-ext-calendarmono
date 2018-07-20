<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\acp;

class main_info
{
	function module()
	{
		return [
			'filename'	=> '\marttiphpbb\calendarmono\acp\main_module',
			'title'		=> 'ACP_CALENDARMONO',
			'modes'		=> [
				'input_range'	=> [
					'title'	=> 'ACP_CALENDARMONO_INPUT_RANGE',
					'auth'	=> 'ext_marttiphpbb/calendarmono && acl_a_board',
					'cat'	=> ['ACP_CALENDARMONO'],
				],
				'input_format'	=> [
					'title'	=> 'ACP_CALENDARMONO_INPUT_FORMAT',
					'auth'	=> 'ext_marttiphpbb/calendarmono && acl_a_board',
					'cat'	=> ['ACP_CALENDARMONO'],
				],
				'input_forums'	=> [
					'title'	=> 'ACP_CALENDARMONO_INPUT_FORUMS',
					'auth'	=> 'ext_marttiphpbb/calendarmono && acl_a_board',
					'cat'	=> ['ACP_CALENDARMONO'],
				],
			],
		];
	}
}
