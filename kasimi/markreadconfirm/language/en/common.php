<?php

/**
 *
 * @package phpBB Extension - Mark Read Confirm
 * @copyright (c) 2016 kasimi - https://kasimi.net
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [
	'MARKREADCONFIRM_FORUMS'	=> 'Mark forums read?',
	'MARKREADCONFIRM_TOPICS'	=> 'Mark topics read?',
]);
