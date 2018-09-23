<?php

/**
 *
 * @package phpBB Extension - Mark Read Confirm
 * @copyright (c) 2018 kasimi - https://kasimi.net
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
	'MARKREADCONFIRM_FORUMS'	=> 'Mark all forums read?',
	'MARKREADCONFIRM_SUBFORUMS'	=> 'Mark subforums read?',
	'MARKREADCONFIRM_TOPICS'	=> 'Mark topics for this forum read?',
]);
