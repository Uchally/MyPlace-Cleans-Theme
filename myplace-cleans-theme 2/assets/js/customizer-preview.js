(function ($) {
	'use strict';
	// Site title live preview.
	wp.customize('blogname', function (value) {
		value.bind(function (to) {
			$('.site-brand span').not('.site-brand__mark').not('.site-brand__dot').first().text(to);
		});
	});
})(jQuery);
