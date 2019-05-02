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
$text_jas .= 'jQuery( "#dialog_'.$das['external_id'].'" ).dialog({ 
autoOpen: false, 
height: 600,
top:500,
 modal: true,
open: function(event, ui) {
	
			
      // Reset Dialog Position
     jQuery(this).dialog(\'widget\').position({ my: "right", at: "right", of: window }),
	 jQuery(\'.ui-widget-overlay\').bind(\'click\',function(){
		 
		
                jQuery(\'#dialog_'.$das['external_id'].'\').dialog(\'close\');
            });
	
  
           
			
			
			 jQuery(\'#save_d_'.$das['external_id'].'\').click(function() {
                
					     var form_data = jQuery("#adminForm_'.$das['external_id'].'").serialize();
				 
			jQuery.ajax({
    url: \'admin-ajax.php?action=page_edit_save&external_id='.$das['external_id'].'\',
	data:form_data,
    type: \'post\',
    success: function(data){
		
     jQuery(\'#dialog_'.$das['external_id'].'\').dialog(\'close\');  
    }   
   });		
        
			 
            });	
			
			 jQuery(\'#cancel_'.$das['external_id'].'\').click(function() {
                
				
           jQuery(this).dialog(\'close\');	
			 
            });	
				
    },
  buttons: {
	  
        \'Import to Shop\': function() {
			     var form_data = jQuery("#adminForm_'.$das['external_id'].'").serialize();
				 
			//	 jQuery(\'#dialog_'.$das['external_id'].'\').dialog(\'close\');
				 
				 
			//	  jQuery("#butimport_'.$das['external_id'].'").attr("class", "it_right load");
				  
				  
			jQuery.ajax({
    url: \'admin-ajax.php?action=page_import_shop&external_id='.$das['external_id'].'\',
	data:form_data,
    type: \'post\',
    success: function(data){
		
		
		
	//	AddRemFunction('.$das['external_id'].');
    }   
   });	
			
			
			
		},
        \'Save\': function() {
					     var form_data = jQuery("#adminForm_'.$das['external_id'].'").serialize();
				 
			jQuery.ajax({
    url: \'admin-ajax.php?action=page_edit_save&external_id='.$das['external_id'].'\',
	data:form_data,
    type: \'post\',
    success: function(data){
		
     jQuery(\'#dialog_'.$das['external_id'].'\').dialog(\'close\');  
    }   
   });		
				
		},
        \'Cancel\': function() {
			
				
			
		 jQuery(this).dialog(\'close\');		
			
		}
    }
		,
		close : function(){
			
			 jQuery( this ).html("");
 	 
				  
		}
				  
				  
	
 });
 



jQuery( "#butedit_'.$das['external_id'].'" ).click(function() {
	
	
 jQuery("#butedit_'.$das['external_id'].'").attr("class", "it_right load");


 jQuery.ajax({
    url: \'admin-ajax.php?action=page_edit&external_id='.$das['external_id'].'\',
    success: function(data){
		jQuery("#butedit_'.$das['external_id'].'").attr("class", "it_right");
        jQuery( "#dialog_'.$das['external_id'].'" ).html(data.slice(0, -4));
		jQuery( "#dialog_'.$das['external_id'].'" ).dialog( "open" );
		document.getElementById("defaultOpen_'.$das['external_id'].'").click();
		var id = "'.$das['external_id'].'";
	//	tinymce.execCommand(\'mceRemoveEditor\',true,"textarea#editor_id_"+id); tinymce.execCommand(\'mceAddEditor\',true,"textarea#editor_id_"+id);
	tinymce.remove("textarea#editor_id_"+id);
	tinymce.init({selector:"textarea#editor_id_"+id});

    }   
   });
   
 
  gal_all_check('.$das['external_id'].');
   
   });
   
 jQuery( "#butimport_'.$das['external_id'].'" ).click(function() {
	
	
 jQuery("#butimport_'.$das['external_id'].'").attr("class", "it_right load");

  ImportFunction("#butimport_'.$das['external_id'].'");

  
   
   });  
   
   
   
   ';
	

		}	 
	 }




$javas = 'jQuery(document).ready(function () {


	'.$text_jas.'
	



});

function gal_all_check(elem_id){

 jQuery("#galery_all").live("click", function() {

	if (this.checked == true){
	


  for (i = 0; i < 150; i++) {
	jQuery("#gal_"+elem_id+"_"+i).parent().attr("class", "thumbnail selected");	  
	 jQuery("#ingal_"+elem_id+"_"+i).val(1); 
  }
		
	}else{
	 for (i = 0; i < 150; i++) {
	jQuery("#gal_"+elem_id+"_"+i).parent().attr("class", "thumbnail");	  
	jQuery("#ingal_"+elem_id+"_"+i).val(0);  
  }	
		
	}
	
});
jQuery("#var_galery_all").live("click", function() {
    	if (this.checked == true){
	


  for (i = 0; i < 150; i++) {
	jQuery("#var_"+elem_id+"_"+i).parent().attr("class", "thumbnail selected");	  
	  jQuery("#invar_"+elem_id+"_"+i).val(1);  
  }
		
	}else{
	 for (i = 0; i < 150; i++) {
	jQuery("#var_"+elem_id+"_"+i).parent().attr("class", "thumbnail");	 
	 jQuery("#invar_"+elem_id+"_"+i).val(0); 
	  
  }	
		
	}
});
}


function gal_select(elem){
	
	

if (jQuery("#in"+elem.id).val() == 1) {
jQuery("#in"+elem.id).val(0);
jQuery(elem).parent().attr("class", "thumbnail");
}else{
jQuery("#in"+elem.id).val(1);
jQuery(elem).parent().attr("class", "thumbnail selected");	
}

}	// select gallery images function

function var_photo_select(elem){

if (jQuery("#in"+elem.id).val() == 1) {
jQuery("#in"+elem.id).val(0);
jQuery(elem).parent().attr("class", "thumbnail");
}else{
jQuery("#in"+elem.id).val(1);
jQuery(elem).parent().attr("class", "thumbnail selected");	
}

}	// select variation images 


function galfeature_select(elem) { 

var count_img = '.count(json_decode($item->photos)).';


	
jQuery(elem).attr("class", "feat star_select");
var el_id = elem.id.split("_");

jQuery("#feat_"+el_id[1]+"_"+el_id[2]).val(1);

 
			for (index = 0; index <= count_img; ++index) {
				
				if (elem.id != "galfe_"+el_id[1]+"_"+index) {
				
			jQuery("#galfe_"+el_id[1]+"_"+index).attr("class", "feat");	
				
			jQuery("#feat_"+el_id[1]+"_"+index).val(0);	
			
			
			}
				
			}

	
	
}

function var_photo_feature_select(elem,count_img ) { 

jQuery(elem).attr("class", "feat star_select");
var el_id = elem.id.split("_");

jQuery("#var_feat_"+el_id[1]+"_"+el_id[2]).val(1);

 
 
 count_img.forEach( function(index) { 
  

			
				
console.log("el" +elem.id+" \n "+"el_id"+"varfe_"+el_id[1]+"_"+index);

				if (elem.id != "varfe_"+el_id[1]+"_"+index) {
				
			jQuery("#varfe_"+el_id[1]+"_"+index).attr("class", "feat");	
				
			jQuery("#var_feat_"+el_id[1]+"_"+index).val(0);	
			
			
			}
				
			} );

	
	
}

function openCity(cityName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(cityName).style.display = "block";
	
	
    elmnt.style.backgroundColor = color;
	var id = cityName.split("description_tab_");
	
	if (cityName =="description_tab_"+id[1]) { 
		
	
	}

}



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
	//	jQuery(".loading").show();
	
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
//	jQuery(".loading").show();



	jQuery("#butadd_"+external_id).attr("class", "it_right load");	

jQuery.ajax({ 
    url: \'admin-ajax.php?action=import_add_ajax_request\',
    data:jQuery("#adminForm").serialize()+"&cid[]="+external_id,
    type: \'post\',
    success: function(response)
    {
		
	var obj = JSON.parse(response);
	if (obj["result"]==1){
	    jQuery("#butadd_"+external_id).hide();
		jQuery("#butrem_"+external_id).show();
		jQuery("#butrem_"+external_id).css("top","265px");
		jQuery("#butrem_"+external_id).css("background","red");
		
		jQuery("#butimport_"+external_id).show();
	
jQuery("#it_"+external_id).css("background","yellowgreen");	
		jQuery(".loading").hide();
		
		
		
	}
    
	
	   
    }
});
return false;
}
function ImportFunction(external_id){
	
	

jQuery.ajax({ 
    url: \'admin-ajax.php?action=import_remove_ajax_request\',
    data:jQuery("#adminForm").serialize()+"&cid[]="+external_id+"&task=aliexpress.import_addremove",
    type: \'post\',
    success: function(response)
    {
		
	var obj = JSON.parse(response);
	if (obj["result"]==1){
		
		
	    jQuery("#butadd_"+external_id).show();
		jQuery("#butrem_"+external_id).hide();
		jQuery("#butimport_"+external_id).hide();
		
jQuery("#it_"+external_id).css("background","white");

	
		
	}
    
	
	   
    }
	
});

jQuery("#butimport_"+external_id).parent().attr("style", "display:none;");	
return false;
	
	
}
function AddRemFunction(external_id){

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
		jQuery("#butrem_"+external_id).hide();
		jQuery("#butimport_"+external_id).hide();
		
jQuery("#it_"+external_id).css("background","white");

jQuery("#butrem_"+external_id).parent().attr("style", "display:none;");		
		
	}
    
	
	   
    }
});
return false;
}


function SalePrice(sale, item_number){


if (sale.value == "ali_price")  {
	
jQuery("#sp_sale_pr_input_"+item_number).hide();
jQuery("#sp_ali_sale_"+item_number).show();



}else if (sale.value == "def")  {
	
jQuery("#sp_sale_pr_input_"+item_number).hide();
jQuery("#sp_ali_sale_"+item_number).hide();
	
}else{
jQuery("#sp_sale_pr_input_"+item_number).show();
jQuery("#sp_ali_sale_"+item_number).hide();	
}
	
}

function AllStock(select, item_number){


if (select.value == "set_all")  {
	
jQuery("#sp_stock_pr_input_"+item_number).show();


}else if (select.value == "def")  {
	
jQuery("#sp_stock_pr_input_"+item_number).hide();

	
}
	
}

// function to put set sale aliexpress prices values by button yes or not 
function AliSetSaleValues(item_number,confirm){
	if(confirm == \'yes\'){
		
var put_input = "att_sale_pr_"; // inputs ids
var ali_price_id = "#ali_sale_price_";
SetAliPrices(item_number,ali_price_id,put_input);
jQuery("#sp_ali_sale_"+item_number).hide(); 

	}

if(confirm == \'no\'){
		
jQuery("#sp_ali_sale_"+item_number).hide();

	}	
	
}
// function to put set regular aliexpress prices values by button yes or not 
function AliSetRegValues(item_number,confirm){
	if(confirm == \'yes\'){
		
var put_input = "att_reg_pr_"; // inputs ids
var ali_price_id = "#ali_reg_price_"; 

SetAliPrices(item_number,ali_price_id, put_input);
jQuery("#sp_ali_reg_"+item_number).hide();

	}

if(confirm == \'no\'){
		
jQuery("#sp_ali_reg_"+item_number).hide();

	}	
	
}

function RegPrice(sale, item_number){

if (sale.value == "ali_price")  {
jQuery("#sp_reg_pr_input_"+item_number).hide(); // hid input filed enter value
jQuery("#sp_ali_reg_"+item_number).show(); // show aliexpress setvalu yes or no


}else if (sale.value == "def")  {
jQuery("#sp_reg_pr_input_"+item_number).hide();	
jQuery("#sp_ali_reg_"+item_number).hide();
}else{
jQuery("#sp_reg_pr_input_"+item_number).show();
jQuery("#sp_ali_reg_"+item_number).hide();	
}
	
}
// function to st aliexpresss prices get it and put to input fields
function SetAliPrices(item_number,ali_price_id, put_input){
	
			var i = 200; 
			for (index = 0; index < i; ++index) {
				
			var ali_val = 	jQuery(ali_price_id + item_number).attr("data-value");
		
				jQuery("#"+put_input+item_number+"_"+index).val(ali_val);
}
	
	
}
// function to set all sale prices by button
function SetSaleValues(item_number){

	
	var select_value = jQuery("#all_sale_pr_"+item_number).val();
		var enter_value = "#enter_value_sale_"+item_number;
		var put_input = "att_sale_pr_"; // inputs ids
		
	set_all_prices(item_number,select_value,enter_value,put_input)
}

// function to set all sale prices by button
function SetStockValues(item_number){

	
	var select_value = jQuery("#all_stock_pr_"+item_number).val();
		var enter_value = "#enter_value_stock_"+item_number;
		var put_input = "att_stock_"; // inputs ids
		
	set_all_prices(item_number,select_value,enter_value,put_input)
}

// function to set all regular prices by button
function SetRegValues(item_number){
		var select_value = jQuery("#all_reg_pr_"+item_number).val();
		var enter_value = "#enter_value_reg_"+item_number;
		var put_input = "att_reg_pr_"; // inputs ids
		
	set_all_prices(item_number,select_value,enter_value,put_input)

	}
	
	function set_all_prices(item_number,select_value,enter_value,put_input){
	var val = parseInt(jQuery(enter_value).val()); // make integerger of the value
	
			if (Number.isInteger(val)){// check integer
			
		var value = val ;	// get value of the input of set all
		//console.log("value = "+value);
	//console.log("value = "+select_value);
		if (select_value ==\'multiply\') {
			var i = 200; 
			for (index = 0; index < i; ++index) {
				
			var att_val = 	jQuery("#att_sale_pr_"+item_number+"_"+index).val();
				
				var multiplied_value = value*att_val;
//console.log("att_val = "+att_val);
//console.log("multiplied_value = "+multiplied_value);

				jQuery("#"+put_input+item_number+"_"+index).val(multiplied_value);
}
		
		}
		
if (select_value ==\'set_all\'){
		//console.log(	put_input+item_number);

			jQuery("."+put_input+item_number).val(value);
			
		}
		 
	}else{
		
	}
		
		
	}

';

echo '<script type="text/javascript">';
echo $javas;

echo '</script>';

?>
