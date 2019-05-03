<?php



// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function myStartSession() {
  
        session_start();
 
}

function myEndSession() {
    session_destroy ();
}

function verify_envato_purchase_code($code_to_verify) {
	/*
	use this to check valid code
	$purchase_key = 'PURCHASE KEY TO CHECK';

$purchase_data = verify_envato_purchase_code( $purchase_key );

if( isset($purchase_data['verify-purchase']['buyer']) ) {
	
	echo 'Valid License Key!Details'; 
        echo 'Item ID: ' . $purchase_data['verify-purchase']['item_id'] . ' ';
        echo 'Item Name: ' . $purchase_data['verify-purchase']['item_name'] . ' ';
        echo 'Buyer: ' . $purchase_data['verify-purchase']['buyer']. ' ';
        echo 'License: ' . $purchase_data['verify-purchase']['licence'] . ' ';
        echo 'Created At: ' . $purchase_data['verify-purchase']['created_at'] . ' ';        echo ''; 
} else{
    echo 'Invalid license key.';
}';

*/


	// Your Username
	$username = 'USERNAME';
	
	// Set API Key	
	$api_key = 'API KEY';
	
	// Open cURL channel
	$ch = curl_init();
	 
	// Set cURL options
	curl_setopt($ch, CURLOPT_URL, "http://marketplace.envato.com/api/edge/". $username ."/". $api_key ."/verify-purchase:". $code_to_verify .".json");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

       //Set the user agent
       $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
       curl_setopt($ch, CURLOPT_USERAGENT, $agent);	 
	// Decode returned JSON
	$output = json_decode(curl_exec($ch), true);
	 
	// Close Channel
	curl_close($ch);
	 
	// Return output
	return $output;
}



// save the 
function store($data)
	{

        global $wpdb;
		$product_id_form= $_REQUEST['product_id'];
		$currency = get_woocommerce_currency();
		$proftable =  new stdClass();


		if ($product_id_form =='') {
		foreach ($data->result->products	as $product) {
		//echo "<pre>";
		//print_r ($product);exit;
	
			
	$proftable->type =  "Aliexpress";
	$proftable->external_id =$product->productId;
	$proftable->variation_id = "-";
	$proftable->image= $product->imageUrl;
	//	$proftable->allimagesurl= $product->allImageUrls;
	//$proftable->attributes= $product->attributes;
	$proftable->detail_url= $product->productUrl;
	$proftable->seller_url= null;
	
	
	$proftable->photos=  get_photos($product->allImageUrls) ;
	$proftable->title= $product->productTitle;
	$proftable->subtitle= null;
	$proftable->description= $product->productTitle;
	$proftable->keywords= $_REQUEST['keyword'];


		$arr= (array)  $product;
if(empty($product->commission)) $product->commission = '';

	$arrs=array(
'commission'=>$product->commission,
	'lotNum'=>'"'.$product->lotNum.'"',
	'packageType'=>$product->packageType,
	'30daysCommission'=>$arr['30daysCommission'],
	'discount'=>$product->discount,
	'validTime'=>$product->validTime,
	'volume'=>$product->volume);
	$proftable->prod_add_info=json_encode($arrs);

	$proftable->rate=$product->evaluateScore; 
	$proftable->price= $product->salePrice;
	$proftable->localprice= $product->localPrice;
	$proftable->regular_price= $product->originalPrice;
	$proftable->curr= $currency ;
	$proftable->category_id= $_REQUEST['affiliate_cat_id'];
	$proftable->category_name= null;
	$proftable->link_category_id= $_REQUEST['vir_cat'];
	$proftable->additional_meta= null;
	$proftable->user_image= $product->imageUrl;
	$proftable->user_photos= null;
	$proftable->user_title= $product->productTitle;
	$proftable->user_subtitle= null;
	$proftable->user_description=$product->productTitle;
	$proftable->user_keywords= $_REQUEST['keyword'];
	$proftable->user_price= $product->salePrice;
	$proftable->user_regular_price= $product->originalPrice;
	$proftable->user_schedule_time= null;
	$proftable->currency = $currency;
	

    $proft_array = (array) $proftable;

    $wpdb->replace(
           $wpdb->prefix . "flance_ae",
      $proft_array
        );
	
	        //$wpdb->print_error();
		}
		
		}else{
		$product =$data->result	;
			
	$proftable->type =  "Aliexpress";
	$proftable->external_id =$product->productId;
	$proftable->variation_id = "-";
	$proftable->image= $product->imageUrl;
	//$proftable->attributes= $product->attributes;
	//$proftable->allimagesurl= $product->allImageUrls;
	$proftable->detail_url= $product->productUrl;
	$proftable->seller_url= null;
		$proftable->photos=  get_photos($product->allImageUrls) ;
	$proftable->title= $product->productTitle;
	$proftable->subtitle= null;
	$proftable->description= $product->productTitle;


            $proftable->keywords= $_REQUEST['keyword'];



		$arr= (array)  $product;
		if(empty($product->commission)) $product->commission = '';
	$arrs=array(

		'commission'=>$product->commission,
	'lotNum'=>'"'.$product->lotNum.'"',
	'packageType'=>$product->packageType,
	'30daysCommission'=>$arr['30daysCommission'],
	'discount'=>$product->discount,
	'validTime'=>$product->validTime,
	'volume'=>$product->volume);
	$proftable->prod_add_info=json_encode($arrs);


	$proftable->rate=$product->evaluateScore; 
	$proftable->price= $product->salePrice;
	if (!empty($product->localPrice)) 
		$proftable->localprice= $product->localPrice;
	$proftable->regular_price= $product->originalPrice;
	$proftable->curr= $currency ;
	$proftable->category_id= $_REQUEST['affiliate_cat_id'];
	$proftable->category_name= null;
	$proftable->link_category_id= $_REQUEST['vir_cat'];
	$proftable->additional_meta= null;
	$proftable->user_image= $product->imageUrl;
	$proftable->user_photos= null;
	$proftable->user_title= $product->productTitle;
	$proftable->user_subtitle= null;
	$proftable->user_description=$product->productTitle;
	$proftable->user_keywords= $_REQUEST['keyword'];
	$proftable->user_price= $product->salePrice;
	$proftable->user_regular_price= $product->originalPrice;
	$proftable->user_schedule_time= null;
	$proftable->currency = $currency;
$proft_array = (array) $proftable;
$wpdb->replace(
           $wpdb->prefix . "flance_ae",
      $proft_array
        );
			
		
			
			
		}
		
	}

function store_import($data)
	{
		
		global $wpdb;
		
		$proftable =  new stdClass(); 
	
		$product =$data	;

	
$proft_array = (array) $product;
	

$wpdb->replace(
           $wpdb->prefix . "flance_ae",
      $proft_array
        );
if($wpdb->last_error !== '') {
    $wpdb->print_error();
}		
	
		
	}

// inset product to database

// update item in database
function store_import_update($data)
	{
		
		global $wpdb;
		
		$proftable =  new stdClass(); 
	
		$product =$data	;

	
$proft_array = (array) $product;
	

$wpdb->update( 
	$wpdb->prefix . "flance_ae", 
	$proft_array, 
	array( 'external_id' => $data->external_id )	 
);		
		
		
		
if($wpdb->last_error !== '') {
    $wpdb->print_error();
}		
	
		
	}

function create_item( $rest_request ) {
	
	
	//print_r ($rest_request);exit;
	
   $products_controler = new WC_REST_Products_Controller();
    if ( ! isset( $products_controler ) ) {
        $products_controler = new WC_REST_Products_Controller();
    }
    $wp_rest_request = new WP_REST_Request( 'POST' );
	

	
    $wp_rest_request->set_body_params( $rest_request );
    $res = $products_controler->create_item( $wp_rest_request );
    $res = $res->data;
	$productID = $res['id'];
	
	
		$tags =	$_REQUEST['bas_tag'];
	
	// proudct tags
	
	wp_set_object_terms($productID, $tags, 'product_tag');
	
	
    // The created product must have variations
    // If it doesn't, it's the new WC3+ API which forces us to build those manually
    if ( ! isset( $res['variations'] ) )
        $res['variations'] = array();
    if ( count( $res['variations'] ) == 0 && count( $rest_request['variations'] ) > 0 ) {
       
            $variations_controler = new WC_REST_Product_Variations_Controller();
       
	   
	   
        foreach ( $rest_request['variations'] as $variation ) {
			
			// echo $variation['sku'];exit;
            $wp_rest_request = new WP_REST_Request( 'POST' );
            $variation_rest = array(
                'product_id' => $res['id'],
                'regular_price' => $variation['regular_price'],
				//'sku' => $variation['sku'],
               // 'image' => array( 'id' => '368' ), // must be redeveloped rusty
                'attributes' => $variation['attributes'],
            );
            $wp_rest_request->set_body_params( $variation_rest );
			
			
            $new_variation = $variations_controler->create_item( $wp_rest_request );
			
			// echo "<pre>"; print_r ( $new_variation->data['id']);exit;
			$variation_id = $new_variation->data['id'];
		update_post_meta( $variation_id, '_sku', $variation['sku'] );
		
	//	set_post_thumbnail($variation_id, 593);
            $res['variations'][] = $new_variation->data;
        }
    }
	

    return $res;
}


function create_api(){
	
	 $api_response = wp_remote_get('www.myapi.com');
    $body = wp_remote_retrieve_body($api_response);

    /****** API not ready yet...working on it  *******/
    $data = [
        'type' => 'variable',
        'description' => 'Trying it out for real',
        'short_description' => 'Pellentesque habitant.',
        'categories' => [
            [
                'id' => 9
            ]
        ],
        'images' => [
            [
                'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_4_front.jpg',
                'position' => 0
            ]
        ],
        'attributes' => [
            [
                'name' => 'Color',
                'position' => 0,
                'visible' => true,
                'variation' => true,
                'options' => [
                    'Black',
                    'Green'
                ]
            ],
            [
                'name' => 'Size',
                'position' => 0,
                'visible' => true,
                'variation' => true,
                'options' => [
                    'S',
                    'M'
                ]
            ]
        ],
        'default_attributes' => [
            [
                'name' => 'Color',
                'option' => 'Black'
            ],
            [
                'name' => 'Size',
                'option' => 'S'
            ]
        ],
        'variations' => [ 
            [
                'regular_price' => '29.98', 
                'attributes' => [ 
                    [
                        'slug'=>'color',
                        'name'=>'Color',
                        'option'=>'Black'
                    ]
                ]   
            ],
            [
                'regular_price' => '69.98',
                'attributes' => [
                    [
                        'slug'=>'color', 
                        'name'=>'Color', 
                        'option'=>'Green'
                    ]
                ]
            ] 
        ]
    ];

    $wp_rest_request = new WP_REST_Request( 'POST' );
    $wp_rest_request->set_body_params( $data );
    $products_controller = new WC_REST_Products_Controller;
    $res = $products_controller->create_item( $wp_rest_request );
    $res = $res->data;


    // The created product must have variations
    // If it doesn't, it's the new WC3+ API which forces us to build those manually
    if ( !isset( $res['variations'] ) ){
        $res['variations'] = array();
    }
    if ( count( $res['variations'] ) == 0 && count( $data['variations'] ) > 0 ) {
        if ( ! isset( $variations_controler ) ) {
            $variations_controler = new WC_REST_Product_Variations_Controller();
        }
        foreach ( $data['variations'] as $variation ) {

            $wp_rest_request = new WP_REST_Request( 'POST' );
            $variation_rest = array(
                'product_id' => $res['id'],
                'regular_price' => $variation['regular_price'],
                'attributes' => $variation['attributes'],
            );
            $wp_rest_request->set_body_params( $variation_rest );
            $new_variation = $variations_controler->create_item( $wp_rest_request );
            $res['variations'][] = $new_variation->data;
        }
    }
	
}



		// insert to woocommerce
	function insert_woocommerce() {
	


    // The $_REQUEST contains all the data sent via ajax 
    if ( isset($_REQUEST) ) {

        $cids = $_REQUEST['cid'];
		
		
foreach ($cids as $cid) {

$imp->link_category_id =9;
	$data = [
    'name' => $imp->user_title,
    'description' => $imp->user_description,
	'sku' => $cid,
	'regular_price' => floatval(ereg_replace("[^-0-9\.]","",$imp->regular_price )),
	'sale_price' =>  floatval(ereg_replace("[^-0-9\.]","",$imp->price)),
	 'categories' => [
        [
            'id' => $imp->link_category_id
        ]
    ],
	 'images' => [
        [
            'src' => $imp->user_image,
            'position' => 0
        ]
		]
];
		 create_item( $data);
}
   
     

    }

    // Always die in functions echoing ajax content
   die();
}

	function import_remove_ajax_request() {
		  	global $wpdb;
		  
		  if ( isset($_REQUEST) ) {

        $cids = $_REQUEST['cid'];
		
		foreach ($cids as $cid) {
			$imp =desc_import($cid);
			
		$proft_array = (array) $imp	;
	
	  $proft_array['import_list'] = 'no';
		$wpdb->replace(
           $wpdb->prefix . "flance_ae",
      $proft_array
        );		
				
		$wpdb->show_errors();
			$message[] = $cid;
			
		}
			
	 do_action( 'get_results_import_list'); // get result from database

	$items = get_results_import_list();
	
$newitem_count = count($items);
		
		  }
	$message = json_encode(array('message'=>$message, 'result'=>1, 'count'=>$newitem_count));
	echo 	$message;

	die();	
	}
	
	function page_edit(){
		  if ( isset($_REQUEST) ) {

        $external_id = $_REQUEST['external_id'];
		 
	$item = desc_import( $external_id);
	$prod_add=json_decode($item->prod_add_info);
			
			
			$prod_add_info = (array)$prod_add;
			
			
				$prod_attributes=(array)json_decode($item->attributes); // attributes retrieve from database
	

	
	include 'admin/partials/html-admin-import-product-edit-ajax.php';
	
	
	}
	

	
	

		
		
	}
	
	
	function page_import_shop(){
		// import to woocommerce shope
//		echo "<pre>";		print_r ($_REQUEST );		exit;
	
		$cid = $_REQUEST['external_id'];
		$k=0;
		for($i=0;$i<=30;$i++){
			if(($_REQUEST['featured'][$cid][$i]== 1) && ($_REQUEST['gal'][$cid][$i]==1)){
			
		$k=1;
		}
		
		}
		
		for($i=0;$i<=30;$i++){
			
		if(($_REQUEST['featured'][$cid][$i]== 1) && ($_REQUEST['gal'][$cid][$i]==1)){
			
		$main_images[] = array(
			'src' => $_REQUEST['gal_photo_src'][$cid][$i],
            'position' => 0
				);
				
		}else{
		
		// main product image
			if ((!empty($_REQUEST['gal_photo_src'][$cid][$i]))  && ($_REQUEST['gal'][$cid][$i]==1))  {
		if (($k==1) && ($i == 0)) {
		$main_images[] = array(
		
		'src' => $_REQUEST['gal_photo_src'][$cid][$i],
            'position' => 31
		
		);
		}else{
			$main_images[] = array(
		
		'src' => $_REQUEST['gal_photo_src'][$cid][$i],
            'position' => $i
		
		);
			
		}
			 
			}

		}
		}
		
	//	print_r ($main_images);exit;
		
		if (empty($main_image)) 	$main_image = 	$_REQUEST['gal_photo_src'][$cid]['0'];
		
	$categ =	$_REQUEST['woo_category'];
	foreach($categ as $ct) {
		
		
		$cats[]=array('id' => $ct);
	}
	// variations attribute
	for($i=1;$i<=30;$i++){
		
	
		$variat[$i]['att_sku']= $_REQUEST['att_sku'][$i];
		$variat[$i]['att_color']= $_REQUEST['att_color'][$i];
		$variat[$i]['att_size']= $_REQUEST['att_size'][$i];
		$variat[$i]['att_sale_pr'] = $_REQUEST['att_sale_pr'][$i];
		$variat[$i]['att_reg_pr'] = $_REQUEST['att_reg_pr'][$i];
	$variat[$i]['att_stock'] = $_REQUEST['att_stock'][$i];
	$variat[$i]['img_att'] = $_REQUEST['img_att'][$i];
	
		}
	// simple atributes 
	for($i=1;$i<=30;$i++){
	$s_att[$i]['label']=$_REQUEST['simple_attribute_label'][$i];
	$s_att[$i]['value']=$_REQUEST['simple_attribute_value'][$i];
	if (!empty($_REQUEST['simple_attribute_label'][$i])){
	$attributes[] = array(
	
				'name' => $_REQUEST['simple_attribute_label'][$i],
                'position' => 0,
                'visible' => true,
                'variation' => false,
                'options' => [
				$_REQUEST['simple_attribute_value'][$i]
				]);		
			}
			}
		
		
		// echo "<pre>";print_r ($variat);
		foreach ($variat as $vr){
									$variation[]= array(
												'regular_price' => $vr['att_reg_pr'],
												'sku'  => $vr['att_sku'],
												'attributes' => [
												
																	[
																		'slug'=>'color',
																		'name'=>'Color',
																		'option'=>$vr['att_color']
																	]
																	,
																	[
																		'slug'=>'size',
																		'name'=>'Size',
																		'option'=>$vr['att_size']
																	]
																]
												
														)	;
		}
		
		
		
		
	//print_r ($attributes);exit;
	
	$attributes[] = array(
                'name' => 'Color',
                'position' => 0,
                'visible' => true,
                'variation' => true,
                'options' => [
                    'Black',
                    'yellow'
                ]
            );
    $attributes[] =  array(
                'name' => 'Size',
                'position' => 0,
                'visible' => true,
                'variation' => true,
                'options' => [
                    'S',
                    'M'
                ]
            );
		$variation_example = [
                [
                    'regular_price' => '29.98',
                    'sku'  => '24523523',
                    'attributes' => [
                        [
                            'slug'=>'color',
                            'name'=>'Color',
                            'option'=>'Black'
                        ],
                        [
                            'slug'=>'size',
                            'name'=>'Size',
                            'option'=>'S'
                        ]
                    ]
                ],
                [
                    'regular_price' => '31',
                    'sku'  => '3245345',
                    'attributes' => [
                        [
                            'slug'=>'color',
                            'name'=>'Color',
                            'option'=>'Black'
                        ],
                        [
                            'slug'=>'size',
                            'name'=>'Size',
                            'option'=>'M'
                        ]
                    ]
                ],
                [
                    'regular_price' => '69.98',
                    'sku'  => '245233223',
                    'attributes' => [
                        [
                            'slug'=>'color',
                            'name'=>'Color',
                            'option'=>'Green'
                        ]
                    ]
                ]
            ];

        $data = array(
            'name' => $_REQUEST['title'],
            'description' => $_REQUEST['description_idi_'.$cid],
            'sku' => $_REQUEST['external_id'],
            'regular_price' => floatval(preg_replace("/[^-0-9\.]/","",$_REQUEST['bas_reg_price'] )),
            'sale_price' =>  floatval(preg_replace("/[^-0-9\.]/","",$_REQUEST['bas_price'])),
            'type' =>$_REQUEST['bas_product_type'],
            'status' => $_REQUEST['publish_select'],
            'external_url' => $_REQUEST['external_url'], // affiliate url
            'categories' => $cats,
            'images' => $main_images,
            'attributes' => $attributes,
            'variations' => $variation
        );


       // print_r ($data);die();

		 create_item( $data);
	}
	
	
	// save edited content in import list item
		function page_edit_save(){
			
				  if ( isset($_REQUEST) ) {
			$data =  new stdClass(); 
        	$data->external_id = $_REQUEST['external_id'];
		$data->title= $_REQUEST['title'];
		
     $data->price =  $data->user_price = $_REQUEST['bas_price'];
	 $data->regular_price = $data->user_regular_price = $_REQUEST['[bas_reg_price] '];

    $data->publish_select = $_REQUEST['publish_select'];
	$data->keywords= $_REQUEST['bas_tags'];
	$data->product_type = $_REQUEST['bas_product_type'];
  $data->link_category_id = $_REQUEST['woo_category'];
  $data->description =  $data->user_description =$_REQUEST['description_idi_'.$_REQUEST['external_id']]; 
  
  // simple attributes to work on
  
  foreach ( $_REQUEST['simple_attribute_label'] as $key=>$label) {
	  $attrib = array(
	'label' => $label, // atributes labels
	'value' => $_REQUEST['simple_attribute_label'][$key], // atributes values
	);
$attributes['simple_attributes'][$key] = $attrib;
	  
	  }
	  
//$attributes['product_attributes'] = $aliexpress_parse['product_attributes'];
//$attributes['product_calc'] = $aliexpress_parse['product_calc'];
	
	 
	 $data->attributes =  json_encode($attributes); // attributes fields
		
	// images processing

foreach ($_REQUEST['gal'][$_REQUEST['external_id']]  as $key=>$image_sel) {
	if ($image_sel == '1' ) {
		
		
		$feat = $_REQUEST['featured'][$_REQUEST['external_id']][$key];
		
		if ($feat == 1 ){
			
			$img[]['selected_featured'] = $_REQUEST['gal_photo_src'][$_REQUEST['external_id']][$key];	
			
		}else{
			
		$img[]['selected'] = $_REQUEST['gal_photo_src'][$_REQUEST['external_id']][$key];	
			
		}
		
		
		
	}else{
		
		$img[]['nonselected'] = $_REQUEST['gal_photo_src'][$_REQUEST['external_id']][$key];
		
	}
}


	// 
	$data->photos =$data->user_photos =  json_encode($img);
	
	
	// variation photos 
	foreach ($_REQUEST['var_photo_sel'][$_REQUEST['external_id']]  as $key=>$image_sel) {
	if ($image_sel == '1' ) {
		
	
		$var_feat = $_REQUEST['var_photo_feat'][$_REQUEST['external_id']][$key];
		
		if ($var_feat  == 1 ){
			
			$var_img[$key]['selected_featured'] = $_REQUEST['var_photo_src'][$_REQUEST['external_id']][$key];	
			
		}else{
			
		$var_img[$key]['selected'] = $_REQUEST['var_photo_src'][$_REQUEST['external_id']][$key];	
			
		}
		
	}else{
		
	$var_img[$key]['nonselected'] = $_REQUEST['var_photo_src'][$_REQUEST['external_id']][$key];
		
	}
	
	
	
	}
	
	$data->var_photos =  $data->user_var_photos = json_encode($var_img);
	
	
		
		
		//echo "<pre>";
		//print_r ($data->var_photos);
		//exit;
		 store_import_update($data);

	

	
	
	}
			
			
		}

// add to import list
	function import_add_ajax_request() {
	
		



    // The $_REQUEST contains all the data sent via ajax 
    if ( isset($_REQUEST) ) {

        $cids = $_REQUEST['cid'];
		
		
foreach ($cids as $cid) {
	
    $imp =desc_import($cid); // import to

	$url =$imp->detail_url;
   // echo "<pre>";print_r ($imp);
	$aliexpress_parse = apply_filters( 'ali_attribute_import',array($url, $cid));
    // print_r ($aliexpress_parse);

    $attributes['simple_attributes'] = $aliexpress_parse['simple_attributes'];
    $attributes['product_attributes'] = $aliexpress_parse['product_attributes'];
    $attributes['product_calc'] = $aliexpress_parse['product_calc'];

//exit;
$data = $imp; 

	$data->description =  $aliexpress_parse['fulldescription'];
  $data->attributes=  json_encode($attributes);
$data->user_description =  $aliexpress_parse['fulldescription'];
$data->import_list = 'yes';

		store_import($data);
		 
	// print_r($data);exit;
}
   
     $message =$cids;
	
//$_SESSION['import_ids'][] = $cids;	
		
		
	 do_action( 'get_results_import_list'); // get result from database

	$items = get_results_import_list();
	
$newitem_count = count($items);
    }
	
	
$message = json_encode(array('message'=>$message, 'result'=>1, 'count'=>$newitem_count));
			 
				echo $message ;
				
    // Always die in functions echoing ajax content
   die();
}




function get_results_ae($ids)
	{
		
		global $wpdb;
		
		if (!empty($ids)) {		$ids = implode(', ',$ids);
		
		$wpdb->show_errors();

		 $results = $wpdb->get_results( 
                   $wpdb->prepare("SELECT * FROM {$wpdb->prefix}flance_ae WHERE external_id IN (".$ids.")",$ids) 
				 
                 );

				
				
		$wpdb->show_errors();
		}
	return $results;	
	}

function get_results_import_list()
	{
		
		global $wpdb;
				$wpdb->show_errors();

		 $results = $wpdb->get_results( 
                     $wpdb->prepare("SELECT * FROM {$wpdb->prefix}flance_ae WHERE import_list = 'yes'",'yes') 
                 );

				
				
		$wpdb->show_errors();
		
	return $results;	
	}	
	
	// get results from database
function desc_import($cid){
	global $wpdb;
$res = $wpdb->get_row( "SELECT * FROM  ".$wpdb->prefix . "flance_ae  WHERE external_id = ".$cid );
return $res;
}


add_action('admin_menu', 'notification_bubble_in_admin_menu');

function notification_bubble_in_admin_menu() {
   global $submenu;
	
    $newitem = 5;
	
	 do_action( 'get_results_import_list'); // get result from database

	$items = get_results_import_list();
	
$newitem = count($items);
	
	$submenu['flance-add-aliexpress-dropship']['2']['0'] .= $newitem ? "<span class='update-plugins count-1'><span class='update-count import_number'>$newitem </span></span>" : '';
	
  
}


function get_photos($photos) {
$photos = explode (',',$photos);

foreach ($photos as $key=>$pto){
	
	$images[$key]['selected']= $pto;
	
	
}

return json_encode(	$images);
}

function load_custom_wp_tiny_mce() {

if (function_exists('wp_tiny_mce')) {

  add_filter('teeny_mce_before_init', create_function('$a', '
    $a["theme"] = "advanced";
    $a["skin"] = "wp_theme";
    $a["height"] = "200";
    $a["width"] = "800";
    $a["onpageload"] = "";
    $a["mode"] = "exact";
    $a["elements"] = "intro";
    $a["editor_selector"] = "mceEditor";
    $a["plugins"] = "safari,inlinepopups,spellchecker";

    $a["forced_root_block"] = false;
    $a["force_br_newlines"] = true;
    $a["force_p_newlines"] = false;
    $a["convert_newlines_to_brs"] = true;

    return $a;'));

 wp_tiny_mce(true);
}


}


function product_tags(){
	$product_cat = $terms = get_terms( 'product_tag' );
	
	
		$product_cat_option = (array)get_option('flance_amp_product_cat');
		if( in_array( -1, $product_cat_option ) || empty( $product_cat_option ) ):
	    	
	    	foreach ($product_cat as $product_cat_key => $product_cat_value) {
                echo '<option value=' . $product_cat_value->name . '>' . $product_cat_value->name . '</option>';
	        }
	    else:
			
	        foreach ($product_cat as $product_cat_key => $product_cat_value) {
	            if ( in_array( $product_cat_value->term_id, $product_cat_option ) ) {
	                echo '<option value=' . $product_cat_value->name . ' selected>' . $product_cat_value->name . '</option>';
	            } else {
	                echo '<option value=' . $product_cat_value->name . '>' . $product_cat_value->name . '</option>';
	            }
	        }
	    endif;	
		
		echo '  </optgroup>  </select>';
	
}







function product_cats(){
	$product_cat = get_terms('product_cat', 'hide_empty=0');
		$product_cat_option = (array)get_option('flance_amp_product_cat');
		if( in_array( -1, $product_cat_option ) || empty( $product_cat_option ) ):
	    	
	    	foreach ($product_cat as $product_cat_key => $product_cat_value) {
                echo '<option value=' . $product_cat_value->term_id . '>' . $product_cat_value->name . '</option>';
	        }
	    else:
			
	        foreach ($product_cat as $product_cat_key => $product_cat_value) {
	            if ( in_array( $product_cat_value->term_id, $product_cat_option ) ) {
	                echo '<option value=' . $product_cat_value->term_id . ' selected>' . $product_cat_value->name . '</option>';
	            } else {
	                echo '<option value=' . $product_cat_value->term_id . '>' . $product_cat_value->name . '</option>';
	            }
	        }
	    endif;	
		
		echo '  </optgroup>  </select>';
	
}


	
	