<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.flance.info
 * @since      1.1.4
 *
 * @package    Flance_aliexpress_dropship Pro
 * @subpackage Flance_aliexpress_dropship/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Flance_aliexpress_dropship
 * @subpackage Flance_aliexpress_dropship/admin
 * @author     Rusty <tutyou1972@gmail.com>
 */


class Flance_aliexpress_dropship_Admin  {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.1.4
	 * @access   private
	 * @var      string    $Flance_wamp    The ID of this plugin.
	 */
	private $Flance_wamp;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.1.4
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.1.4
	 * @param      string    $Flance_wamp       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Flance_wamp, $version ) {

		$this->Flance_wamp = $Flance_wamp;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.1.4
	 */
	public function enqueue_styles() {
		// WooCommerce credentials.
        global $woocommerce;
        wp_enqueue_style( 'woocommerce-chosen',  $woocommerce->plugin_url() . '/assets/css/select2.css', array(), $this->version, 'all', true );

	

		wp_enqueue_style('products-admin', plugin_dir_url( __FILE__ ) . 'css/flance-add-multiple-products-admin.css', array(), $this->version, 'all', true );


		wp_enqueue_style( 'flance-dashboard', plugins_url() . '/flance_aliexpress_dropship/assets/css/dashboard.css', array(), $this->version, 'all', true );
	wp_enqueue_style( 'flance-admin', plugins_url() . '/flance_aliexpress_dropship/assets/css/admin.css', array(), $this->version, 'all', true );
	wp_enqueue_style( 'flance-a_002', plugins_url() . '/flance_aliexpress_dropship/assets/css/a_002.css', array(), $this->version, 'all', true );
	wp_enqueue_style( 'flance-a', plugins_url() . '/flance_aliexpress_dropship/assets/css/a.css', array(), $this->version, 'all', true );
	wp_enqueue_style( 'flance-image-picker', plugins_url() . '/flance_aliexpress_dropship/admin/js/image-picker/image-picker.css', array(), $this->version, 'all', true );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.1.4
	 */
	public function enqueue_scripts() {
		
		// WooCommerce credentials.
        global $woocommerce;
        $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
        
        // Loading Chosen Chosen jQuery from WooCommerce.
        wp_enqueue_script( 'woocommerce-chosen-js', $woocommerce->plugin_url() . '/assets/js/select2/select2'.$suffix.'.js', array('jquery'), null, true );

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Flance_aliexpress_dropship_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Flance_aliexpress_dropship_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->Flance_wamp, plugin_dir_url( __FILE__ ) . 'js/flance-add-multiple-products-admin.js', array( 'jquery', 'woocommerce-chosen-js' ), $this->version, true );
			wp_enqueue_script( 'product-admin-js', plugin_dir_url( __FILE__ ) . 'js/flance-add-multiple-products-admin.js', array( 'jquery', 'woocommerce-chosen-js' ), $this->version, true );

				wp_enqueue_script('search-js', plugin_dir_url( __FILE__ ) . 'js/search.js', array( 'jquery'), $this->version, true );	
		// wp_enqueue_script('image-picker', plugin_dir_url( __FILE__ ) . 'js/image-picker/image-picker.js', array( 'jquery'), $this->version, true );	
	}

	// Admin Menu Page Calling function.
	public function flance_amp_admin_menu_page() {

		//create new top-level menu
		add_menu_page(
			'Flance Aliexpress Dropship Pro Settings', 
			'Flance Aliexpress Dropdship Dashboard', 
			'administrator', 
			'flance-add-aliexpress-dropship', 
			array( $this, 'flance_amp_admin_dashboard_page') , 
			'dashicons-cart',
			10
		);
		//call register settings public function
		add_action( 'admin_init', array( $this, 'register_flance_amp_settings' ) );
			add_submenu_page(
 'flance-add-aliexpress-dropship',
 'Aliexpress Product Search', 
 'Aliexpress Product Search', 
 'administrator', 
 'flance-amp-admin-search-page',
 array( $this, 'flance_import_aliexpress_product_search') , 
 
 15);

add_submenu_page(
 'flance-add-aliexpress-dropship',
 'Aliexpress Import list', 
 'Import list', 
 'administrator', 
 'flance-import-aliexpress-dropship', 
 array( $this, 'flance_import_aliexpress_dropship' ) ,

 20);
 add_submenu_page(
 'flance-add-aliexpress-dropship',
 'Settings', 
 'Settings', 
 'administrator', 
  'flance-amp-admin-settings-page' ,
 array( $this, 'flance_amp_admin_settings_page' ),
 30);

	}
	
	// Admin Setting Registration
	public function register_flance_amp_settings() {
		//register our settings
		register_setting( 'flance-amp-settings-group', 'flance_amp_product_cat' );
	
		register_setting( 'flance-amp-settings-group', 'aliexpress_key' );
		register_setting( 'flance-amp-settings-group', 'tracking_id' );
		register_setting( 'flance-amp-settings-group', 'language' );
        register_setting( 'flance-amp-settings-group', 'currency' );
		
	}

	// Admin Settings Page Function
	public function flance_amp_admin_settings_page() {
		include 'partials/html-admin-form.php';
	}
		// Admin Dashboard Page Function
	public function flance_amp_admin_dashboard_page() {
		include 'partials/html-admin-dashboard.php';
	}
		// Admin Search Page Function
public function flance_import_aliexpress_product_search() {
    $res =	$this->flance_import_aliexpress_product_search_input_values();
    include 'partials/html-admin-search.php';
    if ($_GET['task'] == 'search' || $_GET['task'] == '') {
        $results =$this->flance_import_aliexpress_product_search_results($res);

      //  echo "<pre>";        print_r ($results);exit;

        $product_id= $res['product_id'];
        if($product_id =='') {
            foreach ($results->result->products as $product) {

                $ids[] = $product->productId; // get aliexpress product ids from results

            }
        }elseif($product_id !=''){
            $ids[]= $results->result->productId;
            $results->result->products[]=$results->result;

        }
      //  echo "<pre>";print_r($results->result->products);
      //  print_r($ids);

	do_action( 'save_ae', $results); // insert the results to database
	do_action( 'get_results_ae',$ids); // get result from database
	
	$data = get_results_ae($ids);


        $total_results = $results->result->totalResults;

    include 'partials/html-admin-seach-results.php';
}

    if ($_GET['task'] == 'import_add') {
	    $pks = $_POST['cid'];
	
//foreach ($pks as $cid){
		$message = json_encode(array('message'=>$pks, 'result'=>1));
			 
		echo $message ;exit;
			
		//	}
    }
}
public function flance_import_aliexpress_product_search_input_values() {

    $var['keyword'] = $_GET['keyword'];
    $var['min_price'] = $_GET['min_price'];
    $var['max_price'] = $_GET['max_price'];
    $var['min_score'] = $_GET['min_score'];
    $var['woo_cat'] = $_GET['woo_cat'];
    $var['affiliate_cat_id'] = $_GET['affiliate_cat_id'];
    $var['product_id'] = $_REQUEST['product_id'];
    $var['limit'] = $_REQUEST['limit'];
    $var['limitstart'] = $_REQUEST['limitstart'];

return $var  ;
		
}
			
	
public function flance_import_aliexpress_product_search_results($res) {

    if ( ! session_id() ) {
        session_start();
    }

    global $session;
    // print_r($res);
    if (!empty($res['directionTable'])) {
        $sort= $res['directionTable'];
         if ($sort == 'asc' ) $sort = 'orignalPriceUp';
         if ($sort == 'desc' ) $sort = 'orignalPriceDown';


    }else {

        $sort=NUll;
    }






    $keyword = $res['keyword'];

    if (empty($keyword)) {
        $keyword = $_SESSION['keyword'];
    }

    $product_id = $res['product_id'];
    foreach ( $res as $key=>$rt){
        $_SESSION[$key]=$rt;

    }


    if (!empty($res['limitstart'])) {
        $pageNo= $res['limitstart'];
        setcookie( 'limitstart',  $pageNo , 3 * 10000, COOKIEPATH, COOKIE_DOMAIN );
    }else {

        $pageNo=1;
        setcookie( 'limitstart',  $pageNo , 3 * 10000, COOKIEPATH, COOKIE_DOMAIN );
    }
    $currency= $res['vir_currency'];

    $endCreditScore = $res['max_score'];
    $startCreditScore = $res['min_score'];
    $originalPriceFrom =$res['min_price'];
    $originalPriceTo =$res['max_price'];

    if (!empty($res['limit'])) {
        $pageSize= $res['limit'];
        setcookie( 'limit',  $pageSize , 3 * DAYS_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );


    }else {

        $res['limit']=$pageSize=5;
    }



    $category_id = $res['affiliate_cat_id'];
    if (empty( $category_id))  $category_id  = $_SESSION['affiliate_cat_id'];

    $comparams['ali_api'] = get_option('aliexpress_key');
    $comparams['tracking_id'] = get_option('tracking_id');

    include_once ("helpers/aliexpress/tests/Aliex.php");


    if($product_id =='') $aliexpress_json = $Ali->testAliexIO($keyword,$pageNo,$pageSize,$sort,$originalPriceFrom,$originalPriceTo,$startCreditScore,$endCreditScore,$currency,$category_id );
    if($product_id !='') $aliexpress_json = $Ali->testGetProductDetail($product_id,$currency );

   //     echo "<pre>";
    $data = json_decode($aliexpress_json);


  //  print_r ($data);




        return $data   ;
		
			}
		// Admin Import list  Page Function
	public function flance_import_aliexpress_dropship() {
			//$ids=$_SESSION['import_ids'];
			/*
			foreach($ids as $di){

			$jd[]=$di[0] ;
			
			}
			*/
	
		 do_action( 'get_results_import_list'); // get result from database

        $this->items = get_results_import_list();


	 // The $_REQUEST contains all the data sent via ajax 
  
	
		include 'partials/html-admin-import_new.php';
		
		

		
		
	}
public  static function flance_aliexpress_categories(){

    $affiliate_cat_id =$_REQUEST['affiliate_cat_id'];
    if (empty($affiliate_cat_id)) $affiliate_cat_id  = $_SESSION['affiliate_cat_id'];
	$file = __DIR__."/ali_categories.json";
    if (file_exists(__DIR__."/ali_categories.json")) {
        $string= file_get_contents($file);


        $json_a = json_decode($string, true);
        $html = '<select name="affiliate_cat_id">';

        foreach ($json_a["categories"] as $categorie) {
            if ($affiliate_cat_id == $categorie["id"]) {
                $selected = 'selected';

            }else{
                $selected = '';

            }

            if ($categorie["level"] ==1 ){
                $html .= '<option '.$selected.'  value="'.$categorie["id"].'">'.$categorie["name"].'</option>';
            }elseif ($categorie["level"] >1 ){

                $html .= '<option '.$selected.'  value="'.$categorie["id"].'">-'.$categorie["name"].'</option>';

            }

        }
    $html .= '</select>';

    return  $html;

    }
}

	public static function flance_amp_admin_settings_get_product_cats(){
		$product_cat = get_terms('product_cat', 'hide_empty=0');
		$product_cat_option = (array)get_option('flance_amp_product_cat');
		if( in_array( -1, $product_cat_option ) || empty( $product_cat_option ) ):
	    	echo '<option value="-1" selected>All Products</option>';
	    	foreach ($product_cat as $product_cat_key => $product_cat_value) {
                echo '<option value=' . $product_cat_value->term_id . '>' . $product_cat_value->name . '</option>';
	        }
	    else:
			echo '<option value="-1">All Products</option>';
	        foreach ($product_cat as $product_cat_key => $product_cat_value) {
	            if ( in_array( $product_cat_value->term_id, $product_cat_option ) ) {
	                echo '<option value=' . $product_cat_value->term_id . ' selected>' . $product_cat_value->name . '</option>';
	            } else {
	                echo '<option value=' . $product_cat_value->term_id . '>' . $product_cat_value->name . '</option>';
	            }
	        }
	    endif;
	}

	public function wamp_dropdown_roles( $selected ) {
		
		$selected = (array) $selected;

		$editable_roles = array_reverse( get_editable_roles() );
	
		foreach ( $editable_roles as $role => $details ) {
			$name = translate_user_role($details['name'] );
			if ( in_array( $role, $selected ) ) // preselect specified role
				echo "<option selected='selected' value='" . esc_attr($role) . "'>" . $name . "</option>";
			else
				echo "<option value='" . esc_attr($role) . "'>" . $name . "</option>";
		}
	}

	
	public function flance_widget() {
		register_widget( 'Flance_aliexpress_dropship_Widget' );
	}

	public function flance_amp_dropship_plugin_redirect() {
		if (get_option('flance_amp_do_dropship_activation_redirect', false)) {
			delete_option('flance_amp_do_dropship_activation_redirect');
			wp_redirect( admin_url( 'admin.php?page=flance-add-aliexpress-dropship' ) );
		}
	}
	
	public function escape($val){
		
		return $val;
	}
}
