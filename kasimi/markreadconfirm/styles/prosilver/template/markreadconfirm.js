/**
 *
 * @package Mark Read Confirm
 * @version 1.0.0
 * @copyright (c) 2016 kasimi
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
jQuery(function($) {
	var $confirm = $('#markreadconfirm').detach().show();
	$.each(['forums', 'topics'], function(i, target) {
		var confirmed = false;
		$('[data-ajax=mark_' + target + '_read]').click(function(e) {
			if (confirmed) {
				confirmed = false;
			} else {
				var that = this;
				e.preventDefault();
				e.stopImmediatePropagation();
				$confirm.find('p').text($confirm.data('lang-' + target))
				phpbb.confirm($confirm, function() {
					confirmed = true;
					$(that).click();
				});
			}
		}).each(function() {
			$._data(this, 'events').click.reverse();
		});
	});
});
