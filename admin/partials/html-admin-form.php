<div class="wrap about-wrap">
    <h1>Settings Page </h1>

    <div class="about-text">
        <?php printf( __( 'Thank you for downloading this product. <br>
		
		Please enter Aliexpress Key and Tracking Id.<br>
		For any kind of support please post in forum of flance.info or mail me at <a href="mailto:tutyou1972@gmail.com">tutyou1972@gmail.com</a><br>' ), $this->version ); ?>
    </div>
	<?php 
	
	
	?>
	

    <form method="post" action="options.php">
        <?php settings_fields( 'flance-amp-settings-group' ); ?>
        <?php do_settings_sections( 'flance-amp-settings-group' ); ?>
		<h3>Wordpress Products Settings </h3>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Product Category(s)</th>
                <td>
                    <select id="flance_amp_product_cat" name="flance_amp_product_cat[]" multiple="multiple" required>
                        <optgroup label="<?php _e( 'Please select a product category....', 'Flance' )?>">
                            
                            <?php $this->flance_amp_admin_settings_get_product_cats();?>
                        
                        </optgroup>
                    </select>
                    <br>
                    <span class="description"> <code>All Products</code> to show all products.</span>
                </td>
            </tr>
 
       

        </table>
	<h3>	Aliexpress account settings </h3>
	
		
	 <table class="form-table">
	    <tr valign="top">
                <th scope="row"></th>
                <td>
                 <button type="button" id="default_ali">Aliexpress Default Settings</button>
                   
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Aliexpress Api Key</th>
                <td>
                   <input id="aliexpress_key" name="aliexpress_key"
                value = "<?php echo get_option('aliexpress_key');?>">
					<br>
                    <span class="description"> <code>Aliexpress Api key . Please receive at <a href="https://portals.aliexpress.com" >Aliexpress Affiliates Page </a></code> .</span> 
                
                   
                </td>
            </tr>
 <tr valign="top">
                <th scope="row">Tracking Id</th>
                <td>
                  <input id="tracking_id" name="tracking_id"
                value = "<?php echo get_option('tracking_id');?>">
					<br>
               <span class="description"> <code>Aliexpress Tracking Id . Please receive at <a href="https://portals.aliexpress.com" >Aliexpress Affiliates Page </a></code> .</span> 
                 
                
                   
                </td>
</tr>

         <tr valign="top">
             <th scope="row">Language</th>
             <td>
                 <select name="language" id="language">
                     <?php
                     $languages = array(
                         'en' => 'English',
                         'pt' => 'Portuguese',
                         'ru' => 'Russian',
                         'es' =>  'Spanish',
                         'fr'=> 'French',
                         'id'=>'Indonesian',
                         'it'=> 'Italian',
                         'nl' => 'Dutch',
                         'tr' =>'Turkish',
                         'vi' =>'Vietnamese',
                         'th' =>'Thai',
                         'de' => 'German',
                         'ko' => 'Korean',
                         'ja' => 'Japan',
                         'ar' =>'Arabic',
                         'pl' =>'Polish',
                         'he' => 'Hebrew'
                     );
                     foreach($languages as $key=>$lang){ ?>
                         <option value="<?php echo $key ?>"  <?php if (get_option('language')==$key) echo "selected"; ?> ><?php echo $lang ?></option>


                     <?php } ?>

                 </select>


                 <span class="description"> <code>Language of Aliexpress product</code> .</span>



             </td>
</tr>



     </table>
			 

        <?php submit_button(); ?>

    </form>
</div>
<?php 
// Add scripts to wp_head()

$text_jas = '

jQuery(\'#default_ali\').click( SaveClick);';
			
	$javas = '
	<script type="text/javascript">
	jQuery(document).ready(function () {


	'.$text_jas.'



});



	function SaveClick() {
 
jQuery( "#aliexpress_key" ).val(\'19236\' );
jQuery( "#tracking_id" ).val(\'rusty100\');
}





</script>
';

echo $javas ;





?>