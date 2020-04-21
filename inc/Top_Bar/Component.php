<?php
/**
 * WP_Rig\WP_Rig\Top_Bar\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Top_Bar;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_interface;
use function WP_Rig\WP_Rig\wp_rig;
use WP_Customize_Manager;
use function add_action;
use function is_admin;
use function get_theme_mod;
use function wp_enqueue_script;
use function get_theme_file_uri;
use function get_theme_file_path;
use function wp_script_add_data;

/**
 * Class for managing the top bar.
 *
 * Exposes template tags:
 * `wp_rig()->is_primary_sidebar_active()`
 */
class Component implements Component_Interface, Templating_Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'top-bar';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'wp', array( $this, 'init' ) );
		add_action( 'customize_register', array( $this, 'register' ) );
	}

	/**
	 * Gets template tags to expose as methods on the Template_Tags class instance, accessible through `wp_rig()`.
	 *
	 * @return array Associative array of $method_name => $callback_info pairs. Each $callback_info must either be
	 *               a callable or an array with key 'callable'. This approach is used to reserve the possibility of
	 *               adding support for further arguments in the future.
	 */
	public function template_tags() : array {
		return array(
			'is_topbar_active' => array( $this, 'is_topbar_active' ),
		);
	}

	/**
	 * Initializes top bar functionality.
	 */
	public function init() {

		// If this is the admin page, return early.
		if ( is_admin() ) {
			return;
		}

		// If top bar is disabled in Customizer, return early.
		if ( ! self::is_topbar_active() ) {
			return;
		}

	}

	/**
	 * Adds a setting and control for the top bar in the Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
	 */
	public function register( WP_Customize_Manager $wp_customize ) {

		$top_bar_choices = array(
			'top-bar'    => __( 'Top Bar on (default)', 'wp-rig' ),
			'no-top-bar' => __( 'Top Bar off', 'wp-rig' ),
		);

		$wp_customize->add_section(
			'top_bar_section',
			array(
				'priority' => 10,
				'title'    => __( 'Top Bar', 'wp-rig' ),
				'panel'    => 'theme_options',
			)
		);

		$wp_customize->add_setting(
			'top_bar',
			array(
				'default'           => 'top-bar',
				'transport'         => 'postMessage',
				'sanitize_callback' => function( $input ) use ( $top_bar_choices ) : string {
					if ( array_key_exists( $input, $top_bar_choices ) ) {
						return $input;
					}

					return '';
				},
			)
		);

		$wp_customize->add_control(
			'top_bar',
			array(
				'label'           => __( 'Top Bar', 'wp-rig' ),
				'section'         => 'top_bar_section',
				'type'            => 'radio',
				'description'     => __( 'The Top Bar will display contact and social links.', 'wp-rig' ),
				'choices'         => $top_bar_choices,
			)
		);

	}

	/**
	 * Checks whether the topbar is active.
	 *
	 * @return bool True if the topbar is active, false otherwise.
	 */
	public function is_topbar_active() : bool {
		return ( 'no-top-bar' === get_theme_mod( 'top_bar', 'no-top-bar' ) ) ? false : true;
	}


}
