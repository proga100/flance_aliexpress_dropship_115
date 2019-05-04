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
echo '<div id="cloned"><div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix clone">
</div></div>';
echo '<button class="tablink" onclick="openCity(\'attributes_tab_'.$item->external_id.'\', this, \'#777\')" id="defaultOpen_'.$item->external_id.'">Basic info</button>
<button class="tablink" onclick="openCity(\'description_tab_'.$item->external_id.'\', this, \'#777\')">Description</button>
<button class="tablink" onclick="openCity(\'images_tab_'.$item->external_id.'\', this, \'#777\')">Variations</button>
<button class="tablink" onclick="openCity(\'att_tab_'.$item->external_id.'\', this, \'#777\')">Attributes</button>
<button class="tablink" onclick="openCity(\'other_tab_'.$item->external_id.'\', this, \'#777\')">Images</button>';

echo '<form id="adminForm_'.$item->external_id.'" name="">';
echo '<div id="attributes_tab_'.$item->external_id.'" class="tabcontent">';
echo '<div class="bas" >';
echo '<div class="bas_l" ><img class="picCore bas_img" alt="" src="'.$item->image.'" style="visibility: visible;"> </div>';
echo '<div class="bas_r" >';
echo '<div class="bas_title" ><label>Title</label><br/><input class="bas_inp" name="title" type="text" value="'.strip_tags($item->title).'" /></div>';

echo '<div>';
echo '<div class="bas_price" ><label>Price</label><br/>
<input class="bas_inp_price" name="bas_price" type="text" value="'.$item->price.'" /></div>';
echo '<div class="bas_price" ><label>Regular Price</label><br/>
<input class="bas_inp_price" name="bas_reg_price" type="text" value="'.$item->regular_price.'" /></div>';

echo '<div class="bas_publish" ><label>Publish</label>
<br/>
<select class="bas_select" name="publish_select">
<option value="draft">Draft</option>
<option value="publish">Publish</option>

</select></div>';
echo '<div class="bas_tags" ><label>Product Tags</label><br/>';


echo '<select id="bas_tag" name="bas_tag[]" multiple="multiple" required>';
product_tags();
echo '  </optgroup></select>';
echo '</div>';





echo '<div class="bas_type" ><label>Product Type</label>
<br/>
<select class="bas_product_type" name="bas_product_type">
<option value="simple">Simple product</option>
<option value="variable">Variable product</option>
<option value="external">External/Affiliate product</option>


</select></div>';

echo '<input  type ="hidden" name="external_url"  value="'.$item->detail_url.'"/>';
echo '</div>';
echo '<div class="clear" ></div>';

echo '<div class="bas_category" ><label>Category</label><br/>';
echo '<select id="bas_cat" name="woo_category[]" multiple="multiple" required>';
product_cats();
echo '  </optgroup></select>';
echo '</div>

</div>';
echo '</div>';
echo '<div clase="clear" ></div>';
echo '</div>';

echo '<div id="description_tab_'.$item->external_id.'" class="tabcontent">';

wp_editor($item->description, 'editor_id_'.$item->external_id, array(
	'wpautop'       => 1,
	'media_buttons' => 0,
	'textarea_name' => 'description_idi_'.$item->external_id, 
	'textarea_rows' => 400,
	'tabindex'      => null,
	'editor_css'    => '',
	'editor_height' => 425,
	'editor_class'  => 'edit_id',
	'teeny'         => 0,
	'dfw'           => 0,
	'tinymce'       => 1,
	'quicktags'     => 1,
	'drag_drop_upload' => false
) );


echo '</div>';

echo '<div id="images_tab_'.$item->external_id.'" class="tabcontent">';// start tab VARIATIONs
//echo "<pre>";
//print_r ($prod_attributes['product_attributes']);


if ($prod_attributes['product_attributes']){  
echo '<div class="row_1"><div class="fl_ch_check">
<input type="checkbox" name="att_ch_qll" value=""/></div>';
echo '<div class="fl_ch_sku">SKU</div>';
foreach ($prod_attributes['product_attributes'] as $key=>$attr){

	
	echo '<div class="fl_2">'.$attrib_labels[$key].'</div>'; 

	
	
}

echo '<div class="fl_ch ">Product Price</div>';
echo '<div class="fl_ch fl_reg_pr">Sales Prices<br/>
<span class="sp_sale_pr">
<select class="all_sale_pr"  id ="all_sale_pr_'.$item->external_id.'" name="all_sale_pr" onclick="SalePrice(this,\''.$item->external_id.'\')">
<option value="def">Change Prices</option>
<option value="ali_price">Set to Aliexpress Price</option>
<option value="set_all">Set All to New value</option>
<option value="multiply">Multiply by</option>

</select>

</span>
<span class="sp_sale_pr_input" id="sp_sale_pr_input_'.$item->external_id.'" >
<input id="enter_value_sale_'.$item->external_id.'" class="enter_value_sale" name="enter_value_sale_'.$item->external_id.'" value="" placeholder="Enter Value"/>
<a id="sale_apply_'.$item->external_id.'" class="button button_1" onclick="SetSaleValues(\''.$item->external_id.'\')" >Apply</a>
</span>
<span class="sp_ali_sale" id="sp_ali_sale_'.$item->external_id.'" >

<a id="sp_ali_sale_yes_'.$item->external_id.'" class="button button_1" onclick="AliSetSaleValues(\''.$item->external_id.'\',\'yes\')" >Yes</a>
<a id="sp_ali_sale_no_'.$item->external_id.'" class="button button_2" onclick="AliSetSaleValues(\''.$item->external_id.'\',\'no\')" >No</a>
</span>
</div>';
echo '<div class="fl_ch fl_reg_pr">Regular Prices<br/>
<span class="sp_sale_pr">
<select class="all_reg_pr"  id ="all_reg_pr_'.$item->external_id.'" name="all_reg_pr" onclick="RegPrice(this,\''.$item->external_id.'\')">
<option value="def">Change Prices</option>
<option value="ali_price">Set Aliexpress Price</option>
<option value="set_all">Set All to New value</option>
<option value="multiply">Multiply by</option>

</select>

</span>
<span class="sp_reg_pr_input" id="sp_reg_pr_input_'.$item->external_id.'" >
<input id="enter_value_reg_'.$item->external_id.'" class="enter_value_reg" name="enter_value_reg_'.$item->external_id.'" value="" placeholder="Enter Value" />
<a id="reg_apply_'.$item->external_id.'" class="button button_1" onclick = "SetRegValues(\''.$item->external_id.'\')">Apply</a>
</span>

<span class="sp_ali_reg" id="sp_ali_reg_'.$item->external_id.'" >

<a id="sp_ali_reg_yes_'.$item->external_id.'" class="button button_1" onclick="AliSetRegValues(\''.$item->external_id.'\',\'yes\')" >Yes</a>
<a id="sp_ali_reg_no_'.$item->external_id.'" class="button button_2" onclick="AliSetRegValues(\''.$item->external_id.'\',\'no\')" >No</a>
</span>


</div>';
echo '<div class="fl_ch fl_stock_pr">Stock
<br/>
<span class="sp_sale_pr">
<select class="all_stock_pr"  id ="all_stock_pr_'.$item->external_id.'" name="all_stock_pr" onclick="AllStock(this,\''.$item->external_id.'\')">
<option value="def">Change Stocks</option>

<option value="set_all">Set All to New value</option>


</select>

</span>
<span class="sp_stock_pr_input" id="sp_stock_pr_input_'.$item->external_id.'" >
<input id="enter_value_stock_'.$item->external_id.'" class="enter_value_stock" name="enter_value_stock_'.$item->external_id.'" value="" placeholder="Enter Value" />
<a id="stock_apply_'.$item->external_id.'" class="button button_1" onclick = "SetStockValues(\''.$item->external_id.'\')">Apply</a>
</span>


</div>';
		echo '</div> <div class="cl"></div>';
if (isset($prod_attributes['product_calc'])) {
	$i = 0;
	//print_r ($prod_attributes['product_calc']);
foreach ($prod_attributes['product_calc'] as $att) {
	
	$i++;
	
	if (empty($att_sku[$i])) {
	
	$att_sku[$i] = $item->external_id.'-'.$i;
	
	}

	//print_r ($att);
	$aliexpress_sale_price = $att->skuVal->actSkuCalPrice;
	$aliexpress_reg_price = $att->skuVal->skuCalPrice;
	$avail_qty = $att->skuVal->availQuantity;
	$prod_attr = explode(';', $att->skuAttr); // get attributes
	

	
	echo '<div class="row_1"><div class="fl_ch_check">
	
	<input type="checkbox" name="att_ch_'.$key.'" value="'.$checked.'"/></div>';
	echo '<div class="fl_ch_sku"><input class="att_sku" type ="text" name="att_sku['.$i.']" value="'.$att_sku[$i].'"/></div>';
	
	foreach ($prod_attr as $pr_att) {
		
	//	print_r ($prod_attr);exit;
		$chil_att = explode('#', $pr_att); // get attribute value name
		$chil_att_name = explode(':', $chil_att[0]); // get attribute code




	if ($attrib_labels[$chil_att_name[0]]  == 'color'){

        $prod_attributes['product_attributes']=(array)  $prod_attributes['product_attributes'];

    echo "<pre>";    print_r ($prod_attributes['product_attributes']);
	
	$imageme = $prod_attributes['product_attributes']->$chil_att_name[0]->$chil_att_name[1]->image; //image


	echo '
	<div class="fl_2 fl_color"><img class="img_att" src="'.$imageme.'"/>
	<input class="att_color" type ="text" name="att_'.$attrib_labels[$chil_att_name[0]].'['.$i.']" value="'.$chil_att[1].'"/></div>';
	$varitions_images[] = $imageme; // for images tab
	
	}elseif($attrib_labels[$chil_att_name[0]]  == 'size'){

        echo "attr";    print_r ($prod_attributes['product_attributes']->$chil_att_name[0] ); exit;
        $sizeme = $prod_attributes['product_attributes']->$chil_att_name[0]->$chil_att_name[1]->size; //size value
	echo '
	<div class="fl_2 fl_size"><input class="att_size" type ="text" name="att_'.$attrib_labels[$chil_att_name[0]].'['.$i.']" value="'.$sizeme.'"/></div>';
		
		
	}
	}
	
	
		echo '<div class="fl_ch">'.$item->price.'</div>';

	echo '<div class="fl_ch fl_reg_pr">
	<input class="att_sale_pr att_sale_pr_'.$item->external_id.'" type ="text" id="att_sale_pr_'.$item->external_id.'_'.$i.'"  name="att_sale_pr['.$i.']" value="'.$aliexpress_sale_price.'"/>
	<br/>
	<span class="small_price" id="ali_sale_price_'.$item->external_id.'" data-value="'.$aliexpress_sale_price.'" >Aliexpress Sale Price: '.$aliexpress_sale_price.'</span>	
	
	
	
	</div>';
echo '<div class="fl_ch fl_reg_pr">
<input class="att_reg_pr att_reg_pr_'.$item->external_id.'" id="att_reg_pr_'.$item->external_id.'_'.$i.'" type ="text" name="att_reg_pr['.$i.']" value="'.$aliexpress_reg_price.'"/>
<br/>
	<span class="small_price" id="ali_reg_price_'.$item->external_id.'" data-value="'.$aliexpress_reg_price.'">Aliexpress Regular Price: '.$aliexpress_reg_price.'	</span>
</div>';
echo '<div class="fl_ch"><input class="att_stock att_stock_'.$item->external_id.'" id="att_stock_'.$item->external_id.'" type ="text" name="att_stock['.$i.']" value="'.$avail_qty.'"/></div>';	
	echo '</div>'; 
		
		
		echo ' <div class="cl"></div>';
}
}else{
	
	echo "No attributes";
	
}

	}else{
	
	echo "<div class='no_att'><h3> No attributes</h3> </div>";
	
}

echo '</div>'; // tab variations

echo '<div id="att_tab_'.$item->external_id.'" class="tabcontent attributes">';
if (isset($prod_attributes['simple_attributes'])) {
foreach ($prod_attributes['simple_attributes'] as $key=>$att) {
	

	
	echo '<div class="row_1"><div class="fl_ch"><input type="checkbox" name="att_ch_'.$key.'" value="'.$checked.'"/></div>
	<div class="fl_1"><label class="lab">'.$att->label.'</label></div><div class="fl_2">
	<input  type ="hidden" name="simple_attribute_label['.$key.']"  value="'.$att->label.'"/>
	<input class="att" type ="text" name="simple_attribute_value['.$key.']" value="'.$att->value.'"/>
	
	</div></div>'; 
		echo ' <div class="cl"></div>';
}
}else{
	
echo "<div class='no_att'><h3> No attributes</h3> </div>";
	
}

echo '</div>'; 
?>

<div id="other_tab_<?php echo $item->external_id; ?>" class="tabcontent">

<?php if (!empty(json_decode($item->photos))){
	
?>

<div class="galery_title"><input name="galery_all" id="galery_all" class="galery_all" type="checkbox" value="3423423, 243563245, 12341234" >Check All Gallery Images</div>
<div class="container_select gallery">

<ul class="thumbnails image_picker_selector">

<?php

foreach (json_decode($item->photos) as $key=>$ph){ 


foreach ($ph as $sel=>$img_src) {
	
	


if ( $sel == 'selected') {
	
echo '<li><div class="thumbnail selected"> <img onclick="gal_select(this)" class="image_picker_image" id="gal_'.$item->external_id.'_'.$key.'" src="'.$img_src.'">';

	
  echo '<input id="feat_'.$item->external_id.'_'.$key.'" name="featured['.$item->external_id.']['.$key.']" type=hidden value="0" />';
 echo '<div onclick="galfeature_select(this)" id="galfe_'.$item->external_id.'_'.$key.'" class="feat"></div>';

 echo '</div></li>';
 echo '<input id="ingal_'.$item->external_id.'_'.$key.'" name="gal['.$item->external_id.']['.$key.']" type=hidden value="1" />';

 echo '<input id="gal_photo_src_'.$item->external_id.'_'.$key.'" name="gal_photo_src['.$item->external_id.']['.$key.']" type=hidden value="'.$img_src.'" />';


 
}elseif ( $sel == 'selected_featured') {
	
 echo '<li><div class="thumbnail selected"> <img onclick="gal_select(this)" class="image_picker_image" id="gal_'.$item->external_id.'_'.$key.'" src="'.$img_src.'">';
  echo '<input id="feat_'.$item->external_id.'_'.$key.'" name="featured['.$item->external_id.']['.$key.']" type=hidden value="1" />';
 echo '<div onclick="galfeature_select(this)" id="galfe_'.$item->external_id.'_'.$key.'" class="feat star_select"></div>';
echo '</div></li>';
 echo '<input id="ingal_'.$item->external_id.'_'.$key.'" name="gal['.$item->external_id.']['.$key.']" type=hidden value="1" />';

 echo '<input id="gal_photo_src_'.$item->external_id.'_'.$key.'" name="gal_photo_src['.$item->external_id.']['.$key.']" type=hidden value="'.$img_src.'" />';




 }else{
	
echo '<li><div class="thumbnail"> <img onclick="gal_select(this)" class="image_picker_image" id="gal_'.$item->external_id.'_'.$key.'"  src="'.$img_src.'">
<div onclick="galfeature_select(this)"  id="galfe_'.$item->external_id.'_'.$key.'" class="feat"></div> </div></li>';	
 echo '<input id="ingal_'.$item->external_id.'_'.$key.'" name="gal['.$item->external_id.']['.$key.']" type=hidden value="0" />';
 echo '<input id="gal_photo_src_'.$item->external_id.'_'.$key.'" name="gal_photo_src['.$item->external_id.']['.$key.']" type=hidden value="'.$img_src.'" />'; 
   echo '<input id="feat_'.$item->external_id.'_'.$key.'" name="featured['.$item->external_id.']['.$key.']" type=hidden value="0" />';
}
	
}

 
}

}



?>
</ul>
</div>

<div class="galery_title"><input name="var_galery_all" id="var_galery_all" type="checkbox" value="var_galery_all" >Check All Variations Images</div>
<div class="container_select gallery">

<ul class="thumbnails image_picker_selector">
<?php


$var_photos = json_decode($item->var_photos);


if (!empty($var_photos)) {

$keys = array_keys((array) $var_photos);

$jav_keys= implode(',', $keys );
foreach ((array) $var_photos as $key=>$val){
	$sel = $feat  ='';
	$var_feat = $invar_sel = 0;
	
	$var_img = (array)$val;
	foreach ($var_img as $sel=>$image){ 
	
	if ($sel == 'selected') {
		$sel = 'selected';
		$invar_sel = 1;
	}elseif($sel == 'selected_featured')
	{
		$sel = 'selected';	
		$feat = 'star_select';
		$var_feat = 1;
		$invar_sel = 1;
	}	
	
	echo '<li><div class="thumbnail '.$sel.'"> 
<img onclick="var_photo_select(this)" class="image_picker_image" id="var_'.$item->external_id.'_'.$key.'" src="'.$image.'">
<div id="varfe_'.$item->external_id.'_'.$key.'" class="feat '.$feat.'"  onclick="var_photo_feature_select(this, ['.$jav_keys.'])"></div> 
</div>
</li>';
echo '<input id="var_feat_'.$item->external_id.'_'.$key.'" name="var_photo_feat['.$item->external_id.']['.$key.']" type=hidden value="'.$var_feat.'" />';
  echo '<input id="invar_'.$item->external_id.'_'.$key.'" name="var_photo_sel['.$item->external_id.']['.$key.']" type=hidden value="'.$invar_sel.'" />';
   echo '<input id="invar_src_'.$item->external_id.'_'.$key.'" name="var_photo_src['.$item->external_id.']['.$key.']" type=hidden value="'.$image.'" />';
}
}
	
}elseif (!empty($varitions_images)){
 
?>



<?php

$varitions_images  = array_unique($varitions_images );


$v_amount = count($varitions_images);


$keys = array_keys($varitions_images);

$jav_keys= implode(',', $keys );


foreach ($varitions_images as $key=>$ph){ 

$image_name = explode('_50x50.jpg', $ph);

echo '<li><div class="thumbnail selected"> 
<img onclick="var_photo_select(this)" class="image_picker_image" id="var_'.$item->external_id.'_'.$key.'" src="'.$image_name[0].'_100x100.jpg">
<div id="varfe_'.$item->external_id.'_'.$key.'" class="feat"  onclick="var_photo_feature_select(this, ['.$jav_keys.'])"></div> 


</div>
</li>';
echo '<input id="var_feat_'.$item->external_id.'_'.$key.'" name="var_photo_feat['.$item->external_id.']['.$key.']" type=hidden value="0" />';
  echo '<input id="invar_'.$item->external_id.'_'.$key.'" name="var_photo_sel['.$item->external_id.']['.$key.']" type=hidden value="1" />';
   echo '<input id="invar_src_'.$item->external_id.'_'.$key.'" name="var_photo_src['.$item->external_id.']['.$key.']" type=hidden value="'.$image_name[0].'_100x100.jpg" />';
}
unset($varitions_images);
}
?>

</ul>
</div>
<?php
  echo '<input id="infeature_galfe_'.$item->external_id.'" name="feature_img['.$item->external_id.']" type=hidden value="" />';
  
  
  ?>
</div>
	</form>


