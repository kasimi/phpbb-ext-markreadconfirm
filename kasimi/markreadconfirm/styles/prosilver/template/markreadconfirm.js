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

	var confirmCallback = function(e) {
		if (!$confirm.is(':visible')) {
			e.preventDefault();
			e.stopImmediatePropagation();
			var $this = $(this);
			var actionUrl = $this.prop('href');
			var confirmText = getConfirmText(actionUrl);
			$confirm.find('p').text(confirmText);
			phpbb.confirm($confirm, function(success) {
				if (success) {
					$this.get(0).click();
				}
			});
		}
	};

	phpbb.ajaxify = function(options) {
		if (options.callback === 'mark_topics_read' || options.callback === 'mark_forums_read') {
			$(options.selector).click(confirmCallback);
		}
		ajaxify.call(this, options);
	};

	$('a.mark, a.mark-read').not('[data-ajax]').click(confirmCallback);

})(jQuery);
