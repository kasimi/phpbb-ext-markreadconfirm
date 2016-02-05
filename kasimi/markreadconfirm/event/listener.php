<?php

/**
 *
 * @package phpBB Extension - Mark Read Confirm
 * @copyright (c) 2016 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\markreadconfirm\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/* @var \phpbb\user */
	protected $user;

	/* @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\template\context */
	protected $template_context;

	/**
 	 * Constructor
	 *
	 * @param \phpbb\user				$user
	 * @param \phpbb\template\template	$template
	 * @param \phpbb\template\context	$template_context
	 */
	public function __construct(
		\phpbb\user						$user,
		\phpbb\template\template		$template,
		\phpbb\template\context			$template_context
	)
	{
		$this->user						= $user;
		$this->template					= $template;
		$this->template_context			= $template_context;
	}

	/**
	 * Register hooks
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'	=> 'user_setup',
			'core.page_footer'	=> 'page_footer',
		);
	}

	/**
	 * Load language file
	 */
	public function user_setup($event)
	{
		$this->user->add_lang_ext('kasimi/markreadconfirm', 'common');
	}

	/**
	 * Enable confirmation
	 */
	public function page_footer($event)
	{
		$rootref = &$this->template_context->get_root_ref();
		$markread_confirm = !empty($rootref['U_MARK_FORUMS']) || !empty($rootref['U_MARK_TOPICS']);
		$this->template->assign_var('MARKREADCONFIRM', $markread_confirm);
	}
}
