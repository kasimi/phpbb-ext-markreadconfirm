<?php

/**
 *
 * @package phpBB Extension - Mark Read Confirm
 * @copyright (c) 2018 kasimi - https://kasimi.net
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\markreadconfirm\event;

use phpbb\language\language;
use phpbb\template\template;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/* @var language */
	protected $lang;

	/* @var template */
	protected $template;

	/**
	 * @param language	$lang
	 * @param template	$template
	 */
	public function __construct(
		language $lang,
		template $template
	)
	{
		$this->lang		= $lang;
		$this->template	= $template;
	}

	/**
	 * @return array
	 */
	public static function getSubscribedEvents()
	{
		return [
			'core.page_footer' => 'page_footer',
		];
	}

	/**
	 *
	 */
	public function page_footer()
	{
		if ($this->template->retrieve_var('U_MARK_FORUMS') || $this->template->retrieve_var('U_MARK_TOPICS') || $this->template->retrieve_var('U_MARK_ALL_READ'))
		{
			$this->lang->add_lang('common', 'kasimi/markreadconfirm');
			$this->template->assign_var('MARKREADCONFIRM', true);
		}
	}
}
