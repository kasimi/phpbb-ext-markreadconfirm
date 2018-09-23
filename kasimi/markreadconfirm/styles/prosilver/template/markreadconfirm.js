/**
 *
 * @package phpBB Extension - Mark Read Confirm
 * @copyright (c) 2018 kasimi - https://kasimi.net
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

(function($) {

	'use strict';

	var ajaxify = phpbb.ajaxify;
	var $confirm = $('.markreadconfirm').detach().show();

	var getConfirmText = function(url) {
		if (url.indexOf('mark=forums') !== -1) {
			if (url.indexOf('f=') !== -1) {
				return markReadConfirm.subforums;
			}
			return markReadConfirm.forums;
		}
		return markReadConfirm.topics;
	};

	phpbb.ajaxify = function(options) {
		if (options.callback === 'mark_topics_read' || options.callback === 'mark_forums_read') {
			$(options.selector).click(function(e, confirmed) {
				if (!confirmed) {
					e.preventDefault();
					e.stopImmediatePropagation();
					var actionUrl = $(this).prop('href');
					var confirmText = getConfirmText(actionUrl);
					$confirm.find('p').text(confirmText);
					phpbb.confirm($confirm, function(success) {
						if (success) {
							$(options.selector).trigger('click', true);
						}
					});
				}
			});
		}
		ajaxify.call(this, options);
	};

})(jQuery);
