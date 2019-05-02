<?php
/*----------------------------------------------------------------------------------|  www.vdm.io  |----/
				Flance LTD 
/-------------------------------------------------------------------------------------------------------/
*/



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
	 
$text_jas .= 'jQuery( "#desc_input_'.$das['external_id'].'" ).show();';
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
 jQuery(".loading").show();

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
	   jQuery(".loading").hide();
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
 jQuery(".loading").show();

jQuery( "#desc_"+event.data.text ).show();

//jQuery( "#desc_input_"+event.data.text ).hide();
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
		
	jQuery("#desc_h_"+event.data.text).html(response.replace(/(<([^>]+)>)/g, ""));
		
    //   jQuery("#load_desc_edit_"+event.data.text).hide(); 
	   jQuery(".loading").hide();
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
	jQuery(".loading").show();
jQuery("#load_img_"+external_id).show(); 
	jQuery("#load_img_"+external_id).css("background","yellowgreen");
var  form_datas = jQuery("#adminForm").serialize();

form_datas  = form_datas.replace("task=aliexpress_import&", "");

jQuery.ajax({ 
    url: \'index.php?option=com_aliexpressaffiliateforvirtuemart&view=aliexpress\',
    data:jQuery("#adminForm").serialize()+"&cid[]="+external_id+"&task=aliexpress.virt_publish_json",
    type: \'post\',
    success: function(response)
    {
		
		var obj = JSON.parse(response);
		jQuery( "#tr_"+external_id ).css("background","yellowgreen");
		jQuery( "#publ_"+external_id ).text(\'Yes\')  ;
		jQuery( "#publ_"+external_id ).css("background","yellowgreen");
       jQuery("#load_img_"+external_id).hide(); 
	   
	   jQuery(".loading").hide();
    }
});
return false;
}

';



echo '<div class="loading">Loading&#8230;</div>';
?>
	<table class="table table-striped" id="aliexpressList">
<tr>



		<th width="1%" class="nowrap center hidden-phone">
			
		</th>
		<th width="20" class="nowrap center">
		
		</th>

	
	<th class="nowrap" >
			Image
	</th>
	<th class="nowrap" >
			<?php echo 'Product info'; ?>
	</th>
	
	<th class="rate" >
			<?php echo 'Rating'; ?>
	</th>
	
		<th  class="nowrap center" >
			<?php echo 'Commission'; ?>
		</th>
		<th  class="nowrap center" >
			<?php echo 'Valid Time'; ?>
		</th>
	
	<th width="5" class="nowrap center hidden-phone" >
			<?php echo 'Imported to Virtuemart'; ?>
	</th>
</tr>


<?php
		// Get The Database object


		// Create a new query object.
	
			


 foreach ($this->items as $i => $item): ?>
	<?php
		
		
		
		

	
	
	if ($i != 99999999999999999){
			$prod_add=json_decode($item->prod_add_info);
			$prod_add_info = (array)$prod_add;
		
	
	
	?>
	<tr class="row<?php echo $i % 2; ?>" id="tr_<?php echo $item->external_id; ?>">
		<td class="order nowrap center hidden-phone">




	
			<?php
				
					$iconClass = ' inactive';
				
			?>
			<span class="sortable-handler<?php echo $iconClass; ?>">
				<i class="icon-menu"></i>
			</span>
			<?php if ($this->saveOrder) : ?>
				<input type="text" style="display:none" name="order[]" size="5"
				value="<?php echo $item->ordering; ?>" class="width-20 text-area-order " />
			<?php endif; ?>
		
		</td>
		<td class="nowrap center">
		
				
					<?php //echo JHtml::_('grid.id', $i, $item->external_id); ?>
			
	
		</td>
		
	
		<td class="alimage">
		<?php foreach (explode(",", $item->photos) as $img) { ?>
				<div class="image"><img src="<?php echo $img; ?>"></img></div>
		<?php } ?>
		</td>
		<td class="nowrap product_info">
		
				<div class="name">
					<!-- <a href="<?php echo $edit; ?>&id=<?php echo $item->external_id; ?>"><?php echo $this->escape($item->title); ?></a>
					!-->
				
					
 				<div class="name"><b>External Id: </b>	<?php echo $item->external_id; ?></div>	
 					<div class="name"><b>Title: </b><span id="tit_<?php echo $item->external_id; ?>"><span id="title_h_<?php echo $item->external_id; ?>">
 					<?php echo $this->escape($item->title); ?></span>[<a href="#" id="title_edit_<?php echo $item->external_id; ?>">Edit]</a></span>
 					<span id="load_title_edit_<?php echo $item->external_id; ?>"  class="loading">Please Wait...</span>
					
					<span id="tit_input_<?php echo $item->external_id; ?>">
					<input id="title_input_<?php echo $item->external_id; ?>" name="title_input_<?php echo $item->external_id; ?>" value="<?php echo strip_tags($item->title); ?>" type="text"/>
 					<input id="title_save_button_<?php echo $item->external_id; ?>" value="Save" type="button"/>
 					<input id="title_cancel_button_<?php echo $item->external_id; ?>" value="Cancel" type="button"/> 
 					</span>
 					
 					
 					</div>
					
					
				<div class="name"><b>Description:</b> 
					<!--<span id="desc_<?php echo $item->external_id; ?>"><span id="desc_h_<?php echo $item->external_id; ?>">

				<?php echo $this->escape($item->description); ?></span>[<a href="#" id="desc_edit_<?php echo $item->external_id; ?>">Edit]</a>

					</span> !-->
					
					
					<span id="load_desc_edit_<?php echo $item->external_id; ?>"  class="loading">Please Wait...</span>

					<span id="desc_input_<?php echo $item->external_id; ?>">
					<input id="desc_save_button_<?php echo $item->external_id; ?>" value="Save Description" type="button"/>


<?php
$value = $item->description;

//echo $editor->display('desc_input_text_'.$item->external_id, $value, '550', '300', '60', '20', false);

?>
					
				<!--	<input id="desc_cancel_button_<?php echo $item->external_id; ?>" value="Cancel" type="button"/> !-->
					</span>




				</div>
				<div class="name"><b>Keyword:</b> <?php echo $this->escape($item->keywords); ?></div>
				<div class="name"><b>Price:</b> <?php echo $this->escape($item->price) ?> </div>
				<div class="name"><b>Regular Price:</b> <?php echo $this->escape($item->regular_price) ?> </div>
				<div class="name"><b>Local Price:</b> <?php echo $this->escape($item->localprice) ?> </div>
				<div class="name"><b>Currency:</b> <?php echo $this->escape($item->curr) ?> </div>
				
				
				<div class="name"><b>Virtuemart Category:</b> <?php 	

				echo $this->escape($item->cat_name) ?> </div>
				<br>
				<ul>
			<li class="prod_page"><i class="material-icons">visibility</i><a href="<?php echo $item->detail_url; ?>" >Product Page in Aliexpress Site</a></li>
			<li  class="prod_imp"><i class="material-icons">done</i><a onClick="event.preventDefault();PublishFunction(<?php echo $item->external_id; ?>);"  href="#" >Import/publish to Virtuemart Product</a>
				<span id="load_img_<?php echo $item->external_id; ?>" class="loading_image" style="display:none;"> <h7>Please wait...</h7></span>

				</li>
				</ul>
		
		</td>
		<td class="rate">
		<?php echo $this->escape($item->rate) ?>
		</td>
		<td class="center">
		<?php echo $prod_add_info['30daysCommission'] ?>
		</td>
		<td class="center">
		<?php echo $prod_add_info['validTime'] ?>
		</td>
		<td class="nowrap center hidden-phone">
			<?php if ($aliexpress_found>0){ echo '<span id="publ_'.$item->external_id.'"> Yes</span>';}else{ echo '<span id="publ_'.$item->external_id.'">No</span>'; } ?>
			
		</td>
	</tr>
<?php

	}
 endforeach; ?>
 
 	</table>