<?php
/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\acp;

use marttiphpbb\calendarmono\util\cnst;

class main_info
{
	function module()
	{
		return [
			'filename'	=> '\marttiphpbb\calendarmono\acp\main_module',
			'title'		=> cnst::L_ACP ,
			'modes'		=> [
				'input_range'	=> [
					'title'	=> cnst::L_ACP . '_INPUT_RANGE',
					'auth'	=> 'ext_marttiphpbb/calendarmono && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
				'input_format'	=> [
					'title'	=> cnst::L_ACP . '_INPUT_FORMAT',
					'auth'	=> 'ext_marttiphpbb/calendarmono && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
				'input_forums'	=> [
					'title'	=> cnst::L_ACP . '_INPUT_FORUMS',
					'auth'	=> 'ext_marttiphpbb/calendarmono && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
			],
		];
	}
}
