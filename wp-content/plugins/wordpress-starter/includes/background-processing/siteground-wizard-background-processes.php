<?php
/**
 * Provides functionallity to fire off non-blocking asynchronous requests as a background processes.
 *
 * @link       https://www.siteground.com
 * @since      1.0.0
 *
 * @package    Siteground_Wizard
 * @subpackage Siteground_Wizard/includes
 */

require_once \SiteGround_Wizard\DIR . '/includes/background-processing/wp-async-request.php';
require_once \SiteGround_Wizard\DIR . '/includes/background-processing/wp-background-process.php';

/**
 * Provides functionallity to fire off non-blocking asynchronous requests as a background processes.
 *
 * @since      1.0.0
 * @package    Siteground_Wizard
 * @subpackage Siteground_Wizard/includes
 * @author     SiteGround <hristo.p@siteground.com>
 */
class Siteground_Wizard_Background_Process extends Siteground_Wizard_WP_Background_Process {

	/**
	 * Action.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected $action = 'siteground_wizard_background_process';

	/**
	 * Task
	 *
	 * @param array $item Array containing the class and the
	 *                    method to call in background process.
	 *
	 * @return mixed      False on process success.
	 *                    The current item on failure, which will restart the process.
	 */
	protected function task($item) {

		for ( $i = 0; $i < 3; $i++ ) {
			$response = wp_remote_post( $item['route'], array( 'body' => $item['args'] ) );
			if ( true === $response ) {
				return $item;
			}

			$this->update_status( $item['args']['type'] );

			return false;
		}

		// Remove the process from queue.
		return false;
	}

	/**
	 * Update the status during installation.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $type The item that is being currently installed.
	 */
	private function update_status( $type ) {
		$status = get_option( 'siteground_wizard_installation_status' );

		switch ( $type ) {
			case 'plugin':
				$message = __( 'Installing Plugins', 'siteground-wizard' );
				$progress = 20;
				break;
			case 'theme':
				$message = __( 'Installing the Theme', 'siteground-wizard' );
				$progress = 60;
				break;
			default:
				$message = __( 'Importing Sample Data', 'siteground-wizard' );
				$progress = 80;
				break;
		}

		update_option(
			'siteground_wizard_installation_status',
			array(
				'status'   => 'inprogress',
				'message'  => $message,
				'progress' => $progress,
				'errors'   => get_option( 'siteground_wizard_installation_errors', array() ),
			)
		);
	}

	/**
	 * Complete.
	 *
	 * @since 1.0.0
	 */
	protected function complete() {
		parent::complete();

		// Get the errors.
		$errors = get_option( 'siteground_wizard_installation_errors', array() );

		// Update the status.
		update_option(
			'siteground_wizard_installation_status',
			array(
				'status' => ! empty( $errors ) ? 'failed' : 'completed',
				'errors' => $errors,
			)
		);

		// Reset the errors.
		delete_option( 'siteground_wizard_installation_errors' );
	}

}
