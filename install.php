<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	function flance_install() {



		flance_install_db();

	

		do_action('flance_install_action');
	}


if (!function_exists('flance_install_db')) {

	function flance_install_db() {
		/** @var wpdb $wpdb */
		global $wpdb;

		$charset_collate = '';
		if (!empty($wpdb->charset)) {
			$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
		}
		if (!empty($wpdb->collate)) {
			$charset_collate .= " COLLATE {$wpdb->collate}";
		}

		$table_name = $wpdb->prefix . "flance_ae";
		$sql = "CREATE TABLE IF NOT EXISTS {$table_name}  (
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variation_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attributes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_url` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_url` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photos` text COLLATE utf8mb4_unicode_ci,
  `var_photos` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_add_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curr` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `category_name` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_category_id` int(11) DEFAULT NULL,
  `additional_meta` text COLLATE utf8mb4_unicode_ci,
  `user_image` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_photos` text COLLATE utf8mb4_unicode_ci,
  `user_var_photos` text COLLATE utf8mb4_unicode_ci,
  `user_title` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_subtitle` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `user_keywords` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_price` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_regular_price` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_schedule_time` datetime DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `import_list` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_select` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL  
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
  
  
  ALTER TABLE {$table_name} DROP PRIMARY KEY, ADD PRIMARY KEY( `type`, `external_id`, `variation_id`); ";
				
				

		dbDelta($sql);

	
		
	
	}

}


