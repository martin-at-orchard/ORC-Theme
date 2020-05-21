<?php
/**
 * WP_Rig\WP_Rig\Staff\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Staff;

use WP_Rig\WP_Rig\Component_Interface;
use function WP_Rig\WP_Rig\wp_rig;
use function add_action;
use function is_admin;
use function get_theme_mod;
use function wp_enqueue_script;
use function get_theme_file_uri;
use function get_theme_file_path;
use function wp_script_add_data;

/**
 * Class for managing ORC Staff.
 */
class Component implements Component_Interface {

	/**
	 * Staff departments
	 */
	private $departments = array();

	public function process_departments( $departments ) {

		return $departments;

	}

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'staff';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'wp', [ $this, 'init' ] );

		add_filter( 'orc_get_departments', array( $this, 'process_departments' ) );
	}

	/**
	 * Initializes sticky header functionality.
	 */
	public function init() {

		// Enqueue the scripts and styles
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );

	}

	/**
	 * Enqueues and defer staff JavaScript.
	 */
	public function enqueue() {

		if ( ! is_page( 'staff' ) ) {
			return;
		}

		wp_enqueue_script(
			'wp-rig-staff',
			get_theme_file_uri( '/assets/js/staff.min.js' ),
			array(),
			wp_rig()->get_asset_version( get_theme_file_path( '/assets/js/staff.min.js' ) ),
			true
		);
//		$sticky_header_array = array( 
//			'sticky_mobile' => 'sticky-mobile' === get_theme_mod( 'mobile_header' ) ? 'true' : 'false'
//		);
//		wp_localize_script( 'wp-rig-sticky-header', 'sticky_header_data', $sticky_header_array );
		wp_script_add_data( 'wp-rig-sticky-header', 'defer', true );
		wp_script_add_data( 'wp-rig-sticky-header', 'precache', true );

	}

}
