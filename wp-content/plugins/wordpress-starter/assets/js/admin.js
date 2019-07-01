/*global ajaxurl*/
;(function( $ ) {
	$(document).ready(function() {
		// Hide the dashboard banner.
		$('.sg-button-hide-banner').on('click', function(e) {
			e.preventDefault();

			$('.banner--wizard, .banner-title').remove();


			$.post( $(this).attr('href') );
		})

		// Hide the dashboard banner.
		$('.btn--hide-notifications').on('click', function(e) {
			e.preventDefault();

			$('.important--notifications, .title-notifications').remove();

			$.post( $(this).attr('href') );
		})

		// Switch to default dashboard.
		$('.switch-dashboard').on('click', function(e) {
			e.preventDefault();

			var adminUrl = $(this).data('admin-url');

			$.ajax(
				$(this).attr('href')
			)
			.success(function () {
				window.location.href = adminUrl;
			})

		})

		// Switch to default dashboard.
		$('.sg-restart-wizard').on('click', function(e) {
			e.preventDefault();

			var adminUrl = $(this).data('admin-url');

			$.ajax(
				$(this).attr('href')
			)
			.success(function () {
				window.location.href = adminUrl;
			})

		})
	})
})( jQuery )
