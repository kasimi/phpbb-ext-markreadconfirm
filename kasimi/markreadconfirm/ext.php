<?php

/**
 *
 * @package phpBB Extension - Mark Read Confirm
 * @copyright (c) 2018 kasimi - https://kasimi.net
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\markreadconfirm;

use phpbb\extension\base;

class ext extends base
{
	/**
	 * @return bool
	 */
	public function is_enableable()
	{
		return phpbb_version_compare(PHPBB_VERSION, '3.2.2', '>=') && phpbb_version_compare(PHP_VERSION, '5.4.7', '>=');
	}
}
