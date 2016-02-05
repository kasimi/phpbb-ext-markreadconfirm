<?php

/**
 *
 * @package phpBB Extension - Mark Forums Read Confirm
 * @copyright (c) 2016 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'MARKFORUMSREADCONFIRM_FORUMS'	=> '¿Marcar foros como leídos?',
	'MARKFORUMSREADCONFIRM_TOPICS'	=> '¿Marcar temas como leídos?',
));
