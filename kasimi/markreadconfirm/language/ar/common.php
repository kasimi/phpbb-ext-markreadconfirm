<?php

/**
 *
 * @package phpBB Extension - Mark Read Confirm
 * @copyright (c) 2018 kasimi - https://kasimi.net
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 * Translated By : Bassel Taha Alhitary <http://alhitary.net>
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
	'MARKREADCONFIRM_FORUMS'	=> 'هل أنت متأكد من جعل جميع المنتديات مقروءة؟',
	'MARKREADCONFIRM_SUBFORUMS'	=> 'هل أنت متأكد من جعل جميع المنتديات الفرعية مقروءة؟',
	'MARKREADCONFIRM_TOPICS'	=> 'هل أنت متأكد من جعل جميع المواضيع مقروءة في هذا المنتدى؟',
]);
