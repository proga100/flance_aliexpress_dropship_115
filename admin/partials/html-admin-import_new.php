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

$attrib_labels = array( 
							'200000124' => 'size', // shoes sizes
						  '200000898'=> 'size' , // shoes euorpa sizes
						   '14' => 'color',
						   '136' => 'color', 
						   '5' => 'size', // garments sizes 
						   '200000369' => 'size', // ring sizes
						   '200000783' => 'size' // main stone size
						   );
						   

if (empty($this->items)){
	
	echo '<div>No results</div>';
}else{

$edit = "";
	
$text_jas ='';
	
		
		
	
		
		require('html-admin-import_new_javascript.php');
	

echo '<div class="loading">Loading&#8230;</div>';
?>



			<!-- aliexpress style !-->	
			
			
<div id="main-wrap" class="main-wrap gallery-mode">
								




<div id="gallery-item">
<div id="list-items" class="clearfix temp-height lazy-load" data-spm="3" data-spm-max-idx="445">

<ul class="util-clearfix son-list">


<?php
		// Get The Database object
		

		// Create a new query object.
	
			


 foreach ($this->items as $i => $item): ?>
	<?php
		
		
		
		

	
	
	if ($i != 99999999999999999){
			$prod_add=json_decode($item->prod_add_info);
			
			
			$prod_add_info = (array)$prod_add;
			
			
				$prod_attributes=(array)json_decode($item->attributes); // attributes retrieve from database
	//	echo '<pre>';
// print_r ($prod_attributes['product_attributes']);


	
	?>
	
	
<li   class="list-item">
<?php if(empty($pks)) $pks = array(0); 

include("html-admin-import-product-edit-div.php");

?>

	 <div style="top: 160px; background: green;  text-align: center;" id="butedit_<?php echo $item->external_id; ?>" class="it_right" onClick="event.preventDefault();">
		EDIT </div>
		
		 <div style="" id="butimport_<?php echo $item->external_id; ?>" class="it_right" >
		IMPORT TO SHOP </div>
		
		
		 <div style="top: 270px; background: red;" id="butrem_<?php echo $item->external_id; ?>" class="it_right" onClick="event.preventDefault();AddRemFunction(<?php echo $item->external_id; ?>);">
		REMOVE FROM IMPORT </div>
	
   <div class="item   <?php if ($item->import_list == 'yes'){ ?> it_added <?php } ?>" id="it_<?php echo $item->external_id; ?>" >
   <i id="it_done" class="material-icons " style="color:green;<?php if ($item->import_list == 'yes'){ ?> display:block; <?php }else{ echo 'display:none;'; } ?>"></i>
  
  
        <div class="img img-border">
            <div class="pic">
                <a class="picRind " href="<?php echo $item->detail_url; ?>" target="_blank" >
				
				
				<img class="picCore" alt="" src="<?php echo $item->image; ?>" style="visibility: visible;"> 
			
			
			</a>
				            </div>
        </div>


		
        <div class="info">

            <h3 class="icon-hotproduct">
																					
  <a class="product " href="<?php echo $item->detail_url; ?>" title="<?php echo $item->title; ?>" data-spm-anchor-id="2114.03010108.3.72">
								
								<?php echo $item->title; ?>
								
								</a>
				            </h3>
							
		
<span class="price price-m">
<span class="value" itemprop="price">  <?php echo $this->escape($item->price) ?></span>
<del class="p-del-price-content notranslate">
<span id="j-sku-price" class="p-price"><?php 

if (  preg_replace('/[^0-9.]/','',$item->regular_price) != preg_replace('/[^0-9.]/','',$item->price)) {


echo $this->escape($item->regular_price); 
}

?></span>
								    		    		    		
		    </del>


							        					</span>
   <div class="rate-history">
					                        <span class="star star-s" title="Rate: <?php echo $this->escape($item->rate) ?> from 5">
                        <span class="rate-percent" style="width: <?php echo ($this->escape($item->rate)*100)/5 ?>%;"></span>
						
						
                    </span><span class="percent-num"><em ><?php echo $this->escape($item->rate) ?></em></span>
                       
						                          
                            <span rel="nofollow" class="order-num">
                           
							<em title="orders">  <?php echo $prod_add_info['volume']; ?> Orders </em>
                        </span>
											                </div>
						                <div class="aplus-sp-main">
                  
                </div>
			        </div>
        <div class="info-more">
			          
				
		
          
      
			<?php
 

			if ($aliexpress_found>0){ ?>
			
			
			
			<?php }else{ ?>   
			
			
			<?php 
				}
			
			?>
				
				
				<span id="load_img_<?php echo $item->external_id; ?>" class="loading_image " style="display:none;"> <h7>Please wait...</h7></span>

					<div class="name">
					
				
					
 				<div class="name"><b>External Id: </b>	<?php echo $item->external_id; ?></div>	
			

				</div>
				<div class="name"><b>Keyword:</b> <?php echo $this->escape($item->keywords); ?></div>
				<div class="name"><b>Price:</b> <?php echo $this->escape($item->price) ?> </div>
				<div class="name"><b>Regular Price:</b> <?php echo $this->escape($item->regular_price) ?> </div>
				<div class="name"><b>Local Price:</b> <?php echo $this->escape($item->localprice) ?> </div>
				<div class="name"><b>Currency:</b> <?php echo $this->escape($item->curr) ?> </div>
				<div class="name"><b>30 Days Commission:</b> <?php echo $prod_add_info['30daysCommission'] ?></div>
				<div class="name"><b>Valid Time: </b> <?php echo $prod_add_info['validTime'] ?></div>
				
				<div class="name"><b>Woocoomerce product Category:</b> <?php 	

				echo $this->escape($item->cat_name) ?>
				</div>
			
			
			
			

		
		
		</div>
   
	
	
	
	
	
	</li>				 





	
<?php

	}
 endforeach; ?>
 
 	</ul>
</div>
</div>
</div>

<?php 

}

?>