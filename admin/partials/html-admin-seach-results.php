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

$this->items  = $data;
if (empty($this->items)){
	
	echo '<div>No results</div>';
}else{
	
	

$edit = "index.php?option=com_aliexpressaffiliateforvirtuemart&view=aliexpress&task=aliexpress.edit";
	
$text_jas ='';
	foreach ($this->items as $i => $item) {
		
		
	if ($i != 99999999999999999){
	$das =(array)$item;
	

	
	$text_jas .= 'jQuery(\'#title_edit_'.$das['external_id'].'\').click({ text: \''.$das['external_id'].'\' }, handleClick);';

$text_jas .= 'jQuery(\'#title_save_button_'.$das['external_id'].'\').click({ text: \''.$das['external_id'].'\' }, SaveClick);';

$text_jas .= 'jQuery(\'#title_cancel_button_'.$das['external_id'].'\').click({ text: \''.$das['external_id'].'\' }, CancelClick);';
	 
	$text_jas .= 'jQuery( "#tit_input_'.$das['external_id'].'" ).hide();';

$text_jas .= 'jQuery(\'#desc_edit_'.$das['external_id'].'\').click({ text: \''.$das['external_id'].'\' }, DeskClick);';

$text_jas .= 'jQuery(\'#desc_save_button_'.$das['external_id'].'\').click({ text: \''.$das['external_id'].'\' }, DeskSaveClick);';

$text_jas .= 'jQuery(\'#desc_cancel_button_'.$das['external_id'].'\').click({ text: \''.$das['external_id'].'\' }, DeskCancelClick);';
	 
$text_jas .= 'jQuery( "#desc_input_'.$das['external_id'].'" ).hide();';
$text_jas .= 'jQuery("#load_title_edit_'.$das['external_id'].'").hide();'; 
$text_jas .= 'jQuery("#load_desc_edit_'.$das['external_id'].'").hide();'; 
	

		}	 
	 }


$javas = 'jQuery(document).ready(function () {


	'.$text_jas.'



});

	function handleClick(event) {
 

jQuery( "#tit_"+event.data.text ).hide();

jQuery( "#tit_input_"+event.data.text ).show();


return false;
}

	function SaveClick(event) {
 

jQuery( "#tit_"+event.data.text ).show();

jQuery( "#tit_input_"+event.data.text ).hide();
jQuery("#load_title_edit_"+event.data.text).show(); 
var  form_datas = jQuery("#adminForm").serialize();

form_datas  = form_datas.replace("task=aliexpress_import&", "");


//alert(form_datas);
jQuery.ajax({ 
    url: \'index.php?option=com_aliexpressaffiliateforvirtuemart&view=aliexpress\',
    data:jQuery("#adminForm").serialize()+"&cid="+event.data.text+"&task=aliexpress.virt_edit_json",
    type: \'post\',
    success: function(response)
    {
		
		jQuery("#title_h_"+event.data.text).text(response);
		//alert (response);
       jQuery("#load_title_edit_"+event.data.text).hide(); 
    }
});

return false;
}

	function CancelClick(event) {


jQuery( "#tit_"+event.data.text ).show();

jQuery( "#tit_input_"+event.data.text ).hide();


return false;
}

	function DeskClick(event) {
 

jQuery( "#desc_"+event.data.text ).hide();

jQuery( "#desc_input_"+event.data.text ).show();


return false;
}

	function DeskSaveClick(event) {
 

jQuery( "#desc_"+event.data.text ).show();

jQuery( "#desc_input_"+event.data.text ).hide();
jQuery("#load_desc_edit_"+event.data.text ).show();
var  form_datas = jQuery("#adminForm").serialize();

form_datas  = form_datas.replace("task=aliexpress_import&", "");


//alert(form_datas);
jQuery.ajax({ 
    url: \'index.php?option=com_aliexpressaffiliateforvirtuemart&view=aliexpress\',
    data:jQuery("#adminForm").serialize()+"&cid="+event.data.text+"&task=aliexpress.virt_desc_edit_json",
    type: \'post\',
    success: function(response)
    {
		
	jQuery("#desc_h_"+event.data.text).text(response);
		
       jQuery("#load_desc_edit_"+event.data.text).hide(); 
    }
});
return false;
}

	function DeskCancelClick(event) {


jQuery( "#desc_"+event.data.text ).show();

jQuery( "#desc_input_"+event.data.text ).hide();


return false;
}

function PublishFunction(external_id){
	
	//	jQuery(".loading").show();
jQuery("#load_img_"+external_id).show(); 
	jQuery("#load_img_"+external_id).css("background","yellowgreen");
var  form_datas = jQuery("#adminForm").serialize();

form_datas  = form_datas.replace("task=aliexpress_import&", "");


//alert(form_datas);
jQuery.ajax({ 
    url: \'admin-ajax.php?action=insert_woocommerce\',
    data:jQuery("#adminForm").serialize()+"&cid[]="+external_id,
    type: \'post\',
    success: function(response)
    {
		
		//var obj = JSON.parse(response);
		
       jQuery("#load_img_"+external_id).hide();
	    jQuery(".imp_"+external_id).hide();
		jQuery(".rem_"+external_id).show();
		jQuery("#it_"+external_id).addClass("it_added");
	   	jQuery(".loading").hide();
    }
});
return false;
}

function RemoveFunction(external_id){
		//jQuery(".loading").show();
	
jQuery("#load_img_"+external_id).show(); 
	jQuery("#load_img_"+external_id).css("background","yellowgreen");
var  form_datas = jQuery("#adminForm").serialize();

form_datas  = form_datas.replace("task=aliexpress_import_remove&", "");


//alert(form_datas);
jQuery.ajax({ 
    url: \'index.php?option=com_aliexpressaffiliateforvirtuemart&view=aliexpress\',
    data:jQuery("#adminForm").serialize()+"&cid[]="+external_id+"&task=aliexpress.virt_publish_json",
    type: \'post\',
    success: function(response)
    {
		
		var obj = JSON.parse(response);
		
		
		//jQuery( "#tr_"+external_id ).css("background","yellowgreen");
		// jQuery( "#publ_"+external_id ).text(\'Yes\')  ;
		//jQuery( "#publ_"+external_id ).css("background","yellowgreen");
       jQuery("#load_img_"+external_id).hide();
	    jQuery(".imp_"+external_id).hide();
		jQuery(".rem_"+external_id).show();
			jQuery(".loading").hide();
	   
    }
});
return false;
}
function AddFunction(external_id){
	//jQuery(".loading").show();
	
	jQuery("#butadd_"+external_id).attr("class", "it_right load");
	jQuery("#butimport_"+external_id).attr("class", "it_right load");

jQuery.ajax({ 
    url: \'admin-ajax.php?action=import_add_ajax_request\',
    data:jQuery("#adminForm").serialize()+"&cid[]="+external_id,
    type: \'post\',
    success: function(response)
    {
		
	var obj = JSON.parse(response);
	if (obj["result"]==1){
		
		jQuery("#butadd_"+external_id).attr("class", "it_right");
	jQuery("#butimport_"+external_id).attr("class", "it_right");
	    jQuery("#butadd_"+external_id).hide();
		jQuery("#butrem_"+external_id).show();
		jQuery("#butrem_"+external_id).css("top","265px");
		jQuery("#butrem_"+external_id).css("background","red");
		
		jQuery("#butimport_"+external_id).show();
		jQuery(".import_number").text(obj["count"]);
	
jQuery("#it_"+external_id).css("background","yellowgreen");	
		jQuery(".loading").hide();
		
		
	}
    
	
	   
    }
});
return false;
}

function AddRemFunction(external_id){
	//jQuery(".loading").show();
	
	jQuery("#butrem_"+external_id).attr("class", "it_right load");
	
jQuery.ajax({ 
    url: \'admin-ajax.php?action=import_remove_ajax_request\',
    data:jQuery("#adminForm").serialize()+"&cid[]="+external_id+"&task=aliexpress.import_addremove",
    type: \'post\',
    success: function(response)
    {
		
	var obj = JSON.parse(response);
	if (obj["result"]==1){
	    jQuery("#butadd_"+external_id).show();
		jQuery("#butrem_"+external_id).attr("class", "it_right");
		jQuery("#butrem_"+external_id).hide();
		jQuery("#butimport_"+external_id).hide();
		jQuery(".import_number").text(obj["count"]);
		
jQuery("#it_"+external_id).css("background","white");		
		jQuery(".loading").hide();
	}
    
	
	   
    }
});
return false;
}
';

echo '<script type="text/javascript">';
echo $javas;

echo '</script>';

//$document->addScriptDeclaration($javas);

//$session = JFactory::getSession();
// added import product ids
//$pks = $session->get( 'product_ids');
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
		
	/*
	$query = $db->getQuery(true);
		// Select id from content type table
		$query->select('product_sku');
		$query->from($db->quoteName('#__virtuemart_products'));
		// Where Aliexpress alias is found
		$query->where( $db->quoteName('product_sku') . ' = '. $db->quote($item->external_id) );
		$db->setQuery($query);
		// Execute query to see if alias is found
		$db->execute();
		$aliexpress_found = $db->getNumRows();
	*/
	
	?>
	
	
<li   class="list-item">
<?php if(empty($pks)) $pks = array(0); 

?> 
	 <div style="<?php if ((in_array($item->external_id, $pks))){ echo 'display:none;';} ?>" id="butadd_<?php echo $item->external_id; ?>" class="it_right" onClick="event.preventDefault();AddFunction(<?php echo $item->external_id; ?>);">
		ADD TO IMPORT </div>
		
		 <div style="<?php if ($item->import_list != 'yes'){ echo 'display:none;';} ?>" id="butimport_<?php echo $item->external_id; ?>" class="it_right" onClick="event.preventDefault();AddFunction(<?php echo $item->external_id; ?>);">
		UPDATE IMPORT </div>
		
		
		 <div style="<?php if ($item->import_list != 'yes'){ echo 'display:none;';}else{  echo 'top: 265px; background: red;';} ?>" id="butrem_<?php echo $item->external_id; ?>" class="it_right" onClick="event.preventDefault();AddRemFunction(<?php echo $item->external_id; ?>);">
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