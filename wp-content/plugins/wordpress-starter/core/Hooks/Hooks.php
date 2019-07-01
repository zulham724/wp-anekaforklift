<?php
namespace SiteGround_Wizard\Hooks;

/**
 * Dashboard functions and main initialization class.
 */
class Hooks {
	/**
	 * The constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'wpforms_upgrade_link', array( $this, 'change_wpforms_upgrade_link' ) );
	}

	/**
	 * Change WPForms upgrede link.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $url The upgrade url.
	 *
	 * @return string      Modified url.
	 */
	public function change_wpforms_upgrade_link( $url ) {
		return 'http://www.shareasale.com/r.cfm?B=837827&U=112297&M=64312&urllink=' . rawurlencode( $url );
	}

}
