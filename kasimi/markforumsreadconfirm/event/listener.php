<?php

/**
 *
 * @package phpBB Extension - Mark Forums Read Confirm
 * @copyright (c) 2016 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\markforumsreadconfirm\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/* @var \phpbb\user */
	protected $user;

	/* @var \phpbb\template\template */
	protected $template;

	/**
 	 * Constructor
	 *
	 * @param \phpbb\user				$user
	 * @param \phpbb\template\template	$template
	 */
	public function __construct(
		\phpbb\user $user,
		\phpbb\template\template $template
	)
	{
		$this->user		= $user;
		$this->template = $template;
	}

	/**
	 * Register hooks
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup' => 'user_setup',
		);
	}

	/**
	 * Load language file
	 */
	public function user_setup($event)
	{
		$this->user->add_lang_ext('kasimi/markforumsreadconfirm', 'common');
	}
}
