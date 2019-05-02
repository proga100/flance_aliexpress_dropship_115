<?php

/**
 * Fired during plugin activation
 *
 * @link       http://www.flance.info
 * @since      1.1.4
 *
 * @package    Flance_aliexpress_dropship
 * @subpackage Flance_aliexpress_dropship/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.1.4
 * @package    Flance_aliexpress_dropship
 * @subpackage Flance_aliexpress_dropship/includes
 * @author     Rusty <tutyou1972@gmail.com>
 */
class Flance_aliexpress_dropship_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.1.4
	 */
	public static function activate() {
		$product_cat_option = get_option('flance_amp_product_cat');
		if ( empty( $product_cat_option ) ) {
			add_option( 'flance_amp_product_cat', '-1' );
		}
		
		add_option( 'showname', 'y' );
		add_option( 'showimage', 'y' );
		add_option( 'attribute', 'y' );
		add_option( 'showdesc', 'y' );
		add_option( 'showsku', 'y' );
		add_option( 'showpkg', 'y' );
		add_option( 'showprice', 'y' );
		add_option( 'showquantity', 'y' );
		add_option( 'showaddtocart', 'y' );
		add_option( 'redirect', 'n' );
		add_option( 'reload', 'n' );
		add_option( 'redirectlink', 'cart' );
		add_option( 'showlink', 'y' );
		add_option( 'instock', 'y' );
		add_option('flance_amp_do_activation_redirect', true);
		
		
	
	}

}
