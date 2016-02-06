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
	var confirmed = false;
	$('[data-ajax=mark_' + $confirm.data('target') + '_read]').click(function(e) {
		if (confirmed) {
			confirmed = false;
		} else {
			var that = this;
			e.preventDefault();
			e.stopImmediatePropagation();
			$confirm.find('p').text($confirm.data('lang'));
			phpbb.confirm($confirm, function() {
				confirmed = true;
				$(that).click();
			});
		}
	}).each(function() {
		$._data(this, 'events').click.reverse();
	});
});
