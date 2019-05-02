<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.flance.info
 * @since     1.1.4
 *
 * @package    Flance_aliexpress_dropship
 * @subpackage Flance_aliexpress_dropship/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.1.4
 * @package    Flance_aliexpress_dropship
 * @subpackage Flance_aliexpress_dropship/includes
 * @author     Rusty <tutyou1972@gmail.com>
 */
class Flance_aliexpress_dropship_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.1.4
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'flance-add-multiple-products',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
