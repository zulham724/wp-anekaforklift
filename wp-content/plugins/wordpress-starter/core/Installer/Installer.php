<?php
namespace SiteGround_Wizard\Installer;

use SiteGround_Wizard\Wizard\Wizard;


// Load the background processes.
require \SiteGround_Wizard\DIR . '/includes/background-processing/siteground-wizard-background-processes.php';

/**
 * Installer functions and main initialization class.
 */
class Installer {

	/**
	 * Background Processes handler.
	 *
	 * @var SiteGround_Wizard\Importer
	 *
	 * @since 1.0.0
	 */
	private $background_process;

	/**
	 * The constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_installer_routes' ) );

		$this->background_process = new \Siteground_Wizard_Background_Process();
	}

	/**
	 * Register installer rest routes.
	 *
	 * @since  1.0.0
	 */
	public function register_installer_routes() {
		register_rest_route(
			Wizard::REST_NAMESPACE, '/installer/', array(
				'methods'  => 'POST',
				'callback' => array( $this, 'handle_install_plugins' ),
			)
		);

		register_rest_route(
			Wizard::REST_NAMESPACE, '/installer-progress/', array(
				'methods'  => 'GET',
				'callback' => array( $this, 'get_installer_progress' ),
			)
		);

		register_rest_route(
			Wizard::REST_NAMESPACE, '/install/', array(
				'methods'  => 'POST',
				'callback' => array( $this, 'install' ),
			)
		);
	}

	/**
	 * Install plugins/themes method
	 *
	 * @since  1.0.0
	 *
	 * @param  object $request Request data.
	 *
	 * @return bool True on error, false on success.
	 */
	public function install( $request ) {
		// Get the current errors if any.
		$errors = get_option( 'siteground_wizard_installation_errors', array() );

		// Get the params.
		$body = $request->get_body_params( $request );

		// Execute the installation command.
		exec(
			sprintf(
				'wp %s install %s --activate',
				escapeshellarg( $body['type'] ),
				! empty( $body['download_url'] ) ? escapeshellarg( $body['download_url'] ) : escapeshellarg( $body['slug'] )
			),
			$output,
			$status
		);

		// Check for errors.
		if ( ! empty( $status ) ) {
			$errors[] = sprintf( 'Cannot install %1$s: %2$s', $body['type'], $body['slug'] );
			// Add the error.
			update_option( 'siteground_wizard_installation_errors', $errors );
			return true;
		}

		return false;
	}

	/**
	 * Return the status of plugins & themes installation.
	 *
	 * @since  1.0.0
	 */
	public function get_installer_progress() {
		// Get the current status.
		$status = get_option(
			'siteground_wizard_installation_status',
			array(
				'status'  => 'inprogress',
				'percent' => 1,
				'message' => __( 'Preparing your WordPress installation...', 'siteground-wizard' ),
				'errors'  => array(),
			)
		);

		// Send the status as json.
		wp_send_json( $status );
	}

	/**
	 * Handle plugin install request.
	 *
	 * @since  1.0.0
	 *
	 * @param  object $request Request data.
	 */
	public function handle_install_plugins( $request ) {
		// Reset the status and errors.
		delete_option( 'siteground_wizard_installation_status' );
		delete_option( 'siteground_wizard_installation_errors' );

		// Get the data.
		$data = json_decode( $request->get_body(), true );

		// Bail and send error if provided data is not ok.
		if ( empty( $data ) ) {
			wp_send_json_error();
		}

		exec( 'wp site empty --yes' );

		$sample_data = array();

		// Add background process for each plugin/theme install and for each sample data import.
		foreach ( $data as $item_data ) {
			// Add the sample data for import.
			if (
				! empty( $item_data['type'] ) &&
				'sample-data' === $item_data['type']
			) {
				$sample_data[] = $item_data;
				// Skip this item if it's not a plugin or theme.
				continue;
			}

			$install_process = array(
				'route' => get_rest_url( null, Wizard::REST_NAMESPACE . '/install/' ),
				'args'  => $item_data,
			);

			$this->background_process->push_to_queue( $install_process );
		}

		// Add sample data for import.
		$this->add_sample_data_for_import( $sample_data );

		// Dispatch.
		$this->background_process->save()->dispatch();

		// Notify the api, that everything is ok with provided data.
		wp_send_json_success();
	}

	/**
	 * Add sample data for import.
	 *
	 * @since 1.0.0
	 *
	 * @param array $data The sample data.
	 */
	private function add_sample_data_for_import( $data ) {
		// Add background process for each plugin/theme install and for each sample data import.
		foreach ( $data as $item ) {
			// Add additional process if we have to import sample data.
			$import_process = array(
				'route' => get_rest_url( null, Wizard::REST_NAMESPACE . '/import-sample-data/' ),
				'args'  => array_merge(
					$item,
					array(
						'type' => $item['data_type'],
						'name' => ! empty( $item['name'] ) ? $item['name'] : '',
					)
				),
			);

			$this->background_process->push_to_queue( $import_process );
		}

	}
}
