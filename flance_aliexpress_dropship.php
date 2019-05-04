<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.flance.info
 * @since             1.1.5
 * @package           Flance_aliexpress_dropship
 *
 * @wordpress-plugin
 * Plugin Name:       Flance Aliexpress Dropship
 * Description:       The plugin gives to import products from Aliexpress Into your wordpress ecommerce site and  create the site with specific aliexpress products. It easily imports products from  Aliexpress. Once uploading process is completed, uploaded items will appear in woocommerce section.

The component uses  the Aliexpress official providers APIs.     
 * Version:           1.1.5
 * Author:            Rusty 
 * Author URI:        http://www.flance.info
 * Text Domain:       flance_aliexpress_dropship
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

include_once dirname(__FILE__) . '/install.php';

			register_activation_hook(__FILE__, 'install');
	function install() {
			flance_install();
		}	
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-flance-add-aliexpress-dropship-activator.php
 */
function activate_flance_add_aliexpress_dropship() {
	

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-flance-add-aliexpress-dropship-activator.php';
	Flance_aliexpress_dropship_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-flance-add-aliexpress-dropship-deactivator.php
 */
function deactivate_flance_add_aliexpress_dropship() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-flance-add-aliexpress-dropship-deactivator.php';
	Flance_aliexpress_dropship_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_flance_add_aliexpress_dropship' );
register_deactivation_hook( __FILE__, 'deactivate_flance_add_aliexpress_dropship' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-flance-add-aliexpress-dropship.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.1.4
 */
function run_flance_add_aliexpress_dropship() {

	$plugin = new Flance_aliexpress_dropship();
	
	$plugin->run();

}


/**
 * Check if WooCommerce is active
 **/
 register_activation_hook( __FILE__, 'my_activation_func' );

function my_activation_func() {
    file_put_contents(plugin_dir_path( __FILE__ ) . 'my_loggg.txt', ob_get_contents() );
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	run_flance_add_aliexpress_dropship();
} else {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	deactivate_plugins( plugin_basename( __FILE__ ) );
	add_action( 'admin_notices', 'Flance_aliexpress_wamp_admin_notice__error' );
}

function Flance_aliexpress_wamp_admin_notice__error() {
	$class = 'notice notice-error';
	$message = __( 'You don\'t have WooCommerce activated. Please Activate <b>WooCommerce</b> and then try to activate again <b>Flance Aliexpress Dropship for Woocommerce</b>.', 'Flance' );

	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message ); 
}



add_action( 'save_ae', 'store', 10, 1 );
add_action( 'get_results_ae', 'get_results_ae', 8, 1 );
add_action( 'get_results_import_list', 'get_results_import_list', 9, 1 );
	
	add_action( 'wp_ajax_insert_woocommerce', 'insert_woocommerce'  ); // import to woocommerce product
	add_action( 'wp_ajax_import_add_ajax_request', 'import_add_ajax_request'  );
	add_action( 'wp_ajax_import_remove_ajax_request', 'import_remove_ajax_request'  );

	add_action( 'wp_ajax_page_edit', 'page_edit'  );
		
		add_action( 'wp_ajax_page_edit_save', 'page_edit_save'  );
		
		add_action( 'wp_ajax_page_import_shop', 'page_import_shop'  );

	add_action('init', 'myStartSession', 1); // session start
	add_action('admin_init', 'init_scripts_2');

function init_scripts_2(){
    ///deregister the WP included jQuery and style for the dialog and add the libs from Google
    wp_deregister_script('jquery-ui');
    wp_register_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
    wp_deregister_style('jquery-ui-pepper-grinder');
    wp_register_style('jquery-ui-pepper-grinder', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/pepper-grinder/jquery-ui.min.css');
    wp_enqueue_script('jquery-ui'); ///call the recently added jquery
    wp_enqueue_style('jquery-ui-pepper-grinder'); ///call the recently added style
    
}
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');


	include_once plugin_dir_path( __FILE__ ) . 'functions.php';
	
	add_action("admin_head","load_custom_wp_tiny_mce");


	
	// aliexpress parser to get attributes and full description

require_once  plugin_dir_path( __FILE__ ) . 'admin/helpers/aliexpress_html_parser/ali_html_parser.php';
$aliexpress_parse = new aliexpress_parser();

