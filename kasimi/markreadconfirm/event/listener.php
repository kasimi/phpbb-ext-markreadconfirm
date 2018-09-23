<?php

/**
 *
 * @package phpBB Extension - Mark Read Confirm
 * @copyright (c) 2016 kasimi - https://kasimi.net
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
			'core.page_footer' => 'page_footer',
		);
	}

	/**
	 * Enable confirmation
	 */
	public function page_footer($event)
	{
		$rootref = &$this->template_context->get_root_ref();
		foreach (array('FORUMS', 'TOPICS') as $target)
		{
			if (!empty($rootref['U_MARK_' . $target]))
			{
				$this->user->add_lang_ext('kasimi/markreadconfirm', 'common');
				$this->template->assign_vars(array(
					'MARKREADCONFIRM'			=> true,
					'MARKREADCONFIRM_TARGET'	=> strtolower($target),
					'MARKREADCONFIRM_LANG'		=> $this->user->lang('MARKREADCONFIRM_' . $target),
				));
				break;
			}
		}
	}
}
