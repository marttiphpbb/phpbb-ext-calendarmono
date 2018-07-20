<?php

/**
* phpBB Extension - marttiphpbb calendarmono
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmono\exception;

class out_of_bounds extends base
{
	public function get_message(\phpbb\user $user)
	{
		return $this->translate_portions($user, $this->message_full, 'EXCEPTION_OUT_OF_BOUNDS');
	}
}
