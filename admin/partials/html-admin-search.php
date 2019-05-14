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
 * @since             1.1.4
 * @package           Flance_aliexpress_dropship
 *
 * @wordpress-plugin
 * Plugin Name:       Flance Aliexpress Dropship
 * Description:       The plugin gives to import products from Aliexpress Into your wordpress ecommerce site and  create the site with specific aliexpress products. It easily imports products from  Aliexpress. Once uploading process is completed, uploaded items will appear in woocommerce section.

The component uses  the Aliexpress official providers APIs.     
 * Version:           1.1.4
 * Author:            Rusty 
 * Author URI:        http://www.flance.info
 * Text Domain:       flance_aliexpress_dropship
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

       global $session ;



		
		$product_id =  $_REQUEST['product_id'];
		$keyword =  $_REQUEST[ 'keyword'];
        $affiliate_cat_id =$_REQUEST['affiliate_cat_id'];
        if (empty($keyword)) $keyword = $_SESSION['keyword'];
        if (empty($affiliate_cat_id)) $affiliate_cat_id  = $_SESSION['affiliate_cat_id'];


/*
$vir_cat = $session->get( 'vir_cat', '');
$vir_currency = $session->get( 'vir_currency', '');
$min_price = $session->get( 'min_price', '');
$max_price = $session->get( 'max_price', '');
$min_score = $session->get( 'min_score','');
$max_score = $session->get( 'max_score', '');


*/


?>
 <h2>Aliexpress Product Search</h2>
<div id="filter-bar" class="btn-toolbar">
<div class="btn-group_1 pull-left_1">
             <div class="filter-search btn-group_1 pull-left_1">
		<form id="search_id" action="admin.php" method="get">
                    <div class="simple_s_u">
                        <div class="simle_search_id">
                        <input type="text" name="product_id" id="product_id" placeholder="Product ID Search" value="<?php  if (!empty($product_id)) echo $product_id; ?>" class="hasTooltip search_in" title="Search Aliexpress" />

                        </div>  <div class="simle_or"><h3>Or </h3></div>
                         <div class="simle_search_url">
                        <input type="text" name="product_url" id="product_url" placeholder="Url Search" value="<?php  if (!empty($product_url)) echo $product_url; ?>" class="hasTooltip search_in" title="Search Aliexpress" />

                        </div>

                        <div class="pr_row_4 simple_search">
              <button type="submit" class="btn_1 hasTooltip search_in_button" title="JSEARCH_FILTER_SUBMIT">
              Search</button>
                </div>
                <div class="btn_1 hasTooltip search_in_button by_keyword" >
            Search by keyword
                    </div>
                <div class="btn_1 hasTooltip search_in_button by_product" >
            Search by Product
                    </div>

                </div>

                <div class="cl border_b"></div>

            <div class="pr_search">

                     <div class="pr_row">
                     <div class="pr_row_1">


                           <input type="text" name="keyword" id="keyword" placeholder="Keyword" value="<?php if (!empty($keyword)) echo $keyword; ?>" class="hasTooltip search_in" title="Search Aliexpress" />
                      </div>
                 <div class="pr_row_2">


                    <?php echo  $this->flance_aliexpress_categories(); ?>
                 </div>
                  <div class="pr_row_4">
                  <button type="submit" class="btn_1 hasTooltip search_in_button" title="Search">
                Search</button>
                    </div>
                  <div class="pr_row_4">
                  <div class="btn_1 hasTooltip search_in_button simple" >
                  Simple</div>
                  <div class="btn_1 hasTooltip search_in_button advance" >
                Advanced</div>
                    </div>


                </div>

                <div class="cl"></div>

                <div class="advance_search">
                    <div class="pr_row">
                        <div class="pr_row_8">
                           <div class="pr_row_5">
                                <input name="min_price" id="min_price" placeholder="Min Price" value="<?php if (!empty($min_price)) echo $min_price; ?>" class="small-text search_in" type="text">
                          </div>
                          <div class="pr_row_5">

                                <input name="max_price" id="max_price" placeholder="max Price" value="<?php if (!empty($max_price)) echo $max_price; ?>" class="small-text search_in" type="text">
                          </div>
                      </div>
                       <div class="pr_row_8">
                            <div class="pr_row_5">
                                     <input name="min_score" id="min_score" placeholder="Seller Score Min" value="<?php if (!empty($min_score)) echo $min_score; ?>" class="small-text search_in" type="text">
                           </div>
                           <div class="pr_row_5">

                                 <input name="max_score" id="max_score" placeholder="Seller Score Max" value="<?php if (!empty($max_score)) echo $max_score; ?>" class="small-text search_in" type="text">
                            </div>
                       </div>
                        <div class="pr_row_8">
                            <label  class="form_label">Woocommerce Category:</label>

                            <select name="woo_cat" id ="woo_cat">

                                <?php $this->flance_amp_admin_settings_get_product_cats();?>
                            </select>
                        </div>
                    </div>
                     <div class="cl"></div>

                </div>


            </div>

                 </div>



                    <div class="btn-group pull-left">

                    </div>


                    <input name="page" id="page"  value="flance-amp-admin-search-page"  type="hidden">
                    <input name="task" id="task"  value="search"  type="hidden">
                     <input name="limitstart" id="limitstart_submit"  value=""  type="hidden">
                     <input name="limit" id="limit_submit"  value=""  type="hidden">
	    </form>
</div>
     
    </div>
<div class="clearfix"> </div>


	